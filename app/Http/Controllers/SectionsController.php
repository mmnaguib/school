<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'ar_name'   => 'required',
            'en_name'   => 'required',
            'Grade_id'  => 'required',
            'teacher_id'  => 'required',
        ]);
        $section = new Section();
        $section->section_name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $section->grade_id = $request->Grade_id;
        $section->class_id = $request->Class_id;
        $section->status   = 1;
        $section->save();
        $section->teachers()->attach($request->teacher_id);
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('sections.index');
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

        $request->validate([
            'ar_name'   => 'required',
            'en_name'   => 'required',
            'Grade_id'  => 'required'
        ]);
        $section = Section::find($id);
        $section->section_name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $section->grade_id = $request->Grade_id;
        $section->class_id = $request->Class_id;
        if(isset($request->status)) {
            $section->status = 1;
        } else {
            $section->status = 2;
        }
        $section->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('sections.index');
    }
    public function getClasses($id){
        $list_classes = class_room::where('grade_id', $id)->pluck("classroom_name", "id");
        return $list_classes;
    }
}
