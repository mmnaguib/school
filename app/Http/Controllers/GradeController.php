<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\class_room;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.Grades.grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Grades.create');
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
            'ar_name'   => 'required|unique:grades,name->ar',
            'en_name'   => 'required|unique:grades,name->en',
            'ar_notes'  => 'required|unique:grades,notes->ar',
            'en_notes'  => 'required|unique:grades,notes->en',
        ]);
        $grade = new Grade();
        $grade->name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $grade->notes = ['ar' => $request->ar_notes, 'en' => $request->en_notes];
        $grade->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('grades.index');
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
        $grade = Grade::find($id);
        return view('pages.Grades.edit', compact('grade'));
    }
    public function update(Request $request, $id)
    {
    $request->validate([
        'ar_name'   => 'required|unique:grades,name->ar,'.$id,
        'en_name'   => 'required|unique:grades,name->en,'.$id,
        'ar_notes'  => 'required|unique:grades,notes->ar,'.$id,
        'en_notes'  => 'required|unique:grades,notes->en,'.$id,
    ]);
        $grade = Grade::find($id);
        $grade->name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $grade->notes = ['ar' => $request->ar_notes, 'en' => $request->en_notes];
        $grade->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('grades.index');
    }
    public function destroy($id)
    {
        $classes = class_room::where('grade_id', $id)->pluck('grade_id')->count();
        if($classes > 0){
            toastr()->error(__('site.this_grade_has_many_classrooms'));
            return redirect()->route('grades.index');
        }else{
            $grade = Grade::find($id);
            $grade->delete();
            toastr()->success(__('site.deleted_successfully'));
            return redirect()->route('grades.index');
        }
    }
}
