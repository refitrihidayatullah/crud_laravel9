<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;
use Illuminate\Validation\Rules\Unique;
use PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search
        $keyword = $request->keyword;
        $rows = 5;
        if (strlen($keyword)) {
            $getStudent = DB::table('students')->leftJoin('majors', 'students.major_id', '=', 'majors.major_id')->where('nim', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhere('address', 'like', "%$keyword%")
                ->paginate($rows);
            // dd($getStudent);
        } else {
            $getStudent = DB::table('students')
                ->leftJoin('majors', 'students.major_id', '=', 'majors.major_id')
                ->orderByRaw('student_id DESC')
                ->paginate($rows);
            // dd($getStudent);

        }

        $getMajor = DB::table('majors')
            ->select('major_id', 'major_name')
            ->get();

        return view('student.index', [
            'getStudent' => $getStudent,
            'getMajor' => $getMajor
        ]);
    }
    public function export()
    {
        $rows = 5;
        $getStudent = DB::table('students')
            ->leftJoin('majors', 'students.major_id', '=', 'majors.major_id')
            ->orderByRaw('student_id DESC')
            ->paginate($rows);
        $getMajor = DB::table('majors')
            ->select('major_id', 'major_name')
            ->get();
        $data = PDF::loadview('student.laporan_pdf', [
            'getStudent' => $getStudent,
            'getMajor' => $getMajor
        ]);
        return $data->download('laporan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMajor = DB::table('majors')
            ->select('major_id', 'major_name')
            ->get();
        // dd($getMajor);

        return view('student.create', ['getMajor' => $getMajor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:5|max:5',
            'name' => 'required',
            'major_id' => 'required',
            'address' => 'required',
        ]);
        $data = [
            'nim' => $request->nim,
            'name' => $request->name,
            'address' => $request->address,
            'major_id' => $request->major_id
        ];
        Student::create($data);
        return redirect('/student')->with('success', 'Student Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getAllStudent = DB::table('students')
            ->leftJoin('majors', 'students.major_id', '=', 'majors.major_id')
            ->where('student_id', $id)->first();
        // dd($getAllStudent);
        return view('student.show_student')->with('getAllStudent', $getAllStudent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_student = DB::table('students')
            ->where('student_id', $id)
            ->update([
                'nim' => $request->nim,
                'name' => $request->name,
                'major_id' => $request->major_id,
                'address' => $request->address
            ]);
        return redirect('/student')->with('success', 'Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table('students')
            ->where('student_id', $id)
            ->delete();
        // dd($student);
        return response()->json(['status' => 'Student Deleted Successfully!']);
    }
}
