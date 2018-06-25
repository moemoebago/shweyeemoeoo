<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\ClassName;
use App\Grade;
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $students=Student::all();
        $class_names=ClassName::pluck('name','id')->unique();
        $grade_names=Grade::pluck('name','id')->unique();
        return view('student.index',compact('class_names','grade_names'));
    }

    public function data(Request $request) {
        
        if($request->ajax()) {
            $model = Student::query();
            
            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                $data = "<a href='students/" . $model->id . "/edit' class='btn btn-success btn-sm'>
                        Edit</a>";
                        return $data;
            })
            ->addColumn('delete', function($model) {
                $data = '<form action="' . route('students.destroy', $model->id). '" method="post">'
                            . csrf_field() .
                            method_field("delete") .
                            '<button class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                return $data;
            })
            ->addColumn('grade',function($model)
            {
                $grades=Grade::where('id',$model->grade_id)->value('name');
                return $grades;
            })
            ->addColumn('class',function($model)
            {
                $classes=ClassName::where('id',$model->class_id)->value('name');
                return $classes;
            })
            ->rawColumns(['edit', 'delete','grade','class'])
            ->toJson();
        }   
        return abort(404);     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes=\DB::table('cclasses')->pluck('name','id')->unique();
        $grades=\DB::table('grades')->pluck('name','id')->unique();
        return view('student.create',compact('classes','grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        \DB::table('students')->insert([
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'address'=>$request->address,
            'phone_no'=>$request->phno,
            'class_id'=>$request->class,
            'grade_id'=>$request->grade,
        ]);

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $students=Student::find($id);
        
        $classes=\DB::table('cclasses')->pluck('name','id')->unique();
        $grades=\DB::table('grades')->pluck('name','id')->unique();
        return view('student.edit',compact('id','classes','grades','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \DB::table('students')->where('id',$id)->update([
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'address'=>$request->address,
            'phone_no'=>$request->phno,
            'class_id'=>$request->class,
            'grade_id'=>$request->grade,
        ]);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/students');
    }

    public function getResult($class_name)
    {
        $result=Student::where('class_id',$class_name)->get();
        return response()->json($result);
    }

    public function getGrade($grade_id)
    {
        $result=Student::where('grade_id',$grade_id)->get();
        return response()->json($result);
    }
}
