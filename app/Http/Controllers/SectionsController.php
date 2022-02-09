<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        return view('pages.sections.sections', compact('grades'));
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
        ]);
        $section = new Section();
        $section->section_name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $section->grade_id = $request->grades;
        $section->class_id = $request->classrooms;
        $section->status   = 1;
        $section->save();
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
        //
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
    public function getClasses($id){
        $list_classes = class_room::where('grade_id', $id)->pluck("classroom_name", "id");
        return $list_classes;
    }
}
