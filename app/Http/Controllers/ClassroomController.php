<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classes = class_room::all();
        $grades = Grade::all();
        return view('pages.classrooms.classroom', compact('classes', 'grades'));
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
                'listclasses.*.ar_name' => 'required',
                'listclasses.*.en_name' => 'required',
                'grades'  => 'required',
            ]);
        $listclasses = $request->listclasses;
        foreach($listclasses as $class){
            $classes = new class_room();
            $classes->classroom_name = ['ar' => $class['ar_name'], 'en' => $class['en_name']];
            $classes->grade_id = $class['grades'];
            $classes->save();
        }
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('classroom.index');
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
            'ar_name' => 'required',
            'en_name' => 'required',
            'grades'  => 'required',
        ]);
        $classes = class_room::find($id);
        $classes->classroom_name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $classes->grade_id = $request->grades;
        $classes->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = class_room::find($id);
        $classroom->delete();
        toastr()->success(__('site.deleted_successfully'));
        return redirect()->route('classroom.index');
    }
}
