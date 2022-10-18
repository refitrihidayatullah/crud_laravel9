<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;
use Illuminate\Validation\Rules\Unique;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getMajor = DB::table('majors')
            ->select('major_id', 'major_name')
            ->get();
        $getStudent = DB::table('students')
            ->leftJoin('majors', 'students.major_id', '=', 'majors.major_id')
            ->orderByRaw('student_id DESC')
            ->paginate(5);
        // dd($getStudent);

        return view('student.index', [
            'getStudent' => $getStudent,
            'getMajor' => $getMajor
        ]);
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
        //
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
        //
    }
}
