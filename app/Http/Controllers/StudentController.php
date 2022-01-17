<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listStudent = Student::paginate(5);

        if($request->has('nameKeyword') == true ){
            $nameKeyword = $request->get('nameKeyword');
            $listStudent = Student::where('fullname', 'LIKE', "%$nameKeyword%")->paginate(5);
        }else{
            $listStudent = Student::paginate(5);
        }

        if($request->has('emailKeyword') == true ){
            $emailKeyword = $request->get('emailKeyword');
            $listStudent = Student::where('email', 'LIKE', "%$emailKeyword%")->paginate(5);
        }else{
            $listStudent = Student::paginate(5);
        }
        
        return view('admin.student.index', compact('listStudent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listPoint = Point::all();
        
        return view('admin.student.create', compact('listPoint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $student->avatar = $filename;
        }
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'point_id' => $request->point_id,
            'avatar' => $filename,
        ];
        // dd($data);
        Student::create($data);
        return redirect()->route('showStudent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('admin.student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        $listPoint = Point::all();
        // $data->load('listPoint');
        return view('admin.student.edit', compact('data', 'listPoint'));
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
        $student = new Student();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $student->avatar = $filename;
        }
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'avatar' => $filename,
            'point_id'=>$request->point_id
        ];
        Student::find($id)->update($data);
        return redirect()->route('showStudent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->back();
    }
}
