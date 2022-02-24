<?php
namespace App\Repository\Fee;

use App\Models\class_room;
use App\Models\Fee;
use App\Models\Grade;

class feeRepository implements feeRepositoryInterface{
    public function index() {
        $fees = Fee::all();
        return view('pages.fees.index', compact('fees'));
    }

    public function create() {
        $grades = Grade::all();
        $classrooms = class_room::all();
        return view('pages.fees.create', compact('grades', 'classrooms'));
    }

    public function store($request){
        $request->validate([
            'ar_fees'       => "required",
            'en_fees'       => "required",
            'fee_amount'    => "required|numeric",
            'grades'        => "required",
            'classrooms'    => "required|unique:fees,classroom_id,",
            'academic_year' => "required",
            'notes'         => "required"
        ]);

        $fee = new Fee();
        $fee->name = ['ar' => $request->ar_fees, 'en' => $request->en_fees];
        $fee->amount = $request->fee_amount;
        $fee->grade_id = $request->grades;
        $fee->classroom_id = $request->classrooms;
        $fee->academic_year = $request->academic_year;
        $fee->notes = $request->notes;
        $fee->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('fees.index');
    }

    public function edit($id){
        $grades = Grade::all();
        $classrooms = class_room::all();
        $fee = Fee::findOrFail($id);
        return view('pages.fees.edit', compact('fee','grades','classrooms'));
    }

    public function update($request, $id){
        $request->validate([
            'ar_fees'       => "required",
            'en_fees'       => "required",
            'fee_amount'    => "required|numeric",
            'grades'        => "required",
            'classrooms'    => "required|unique:fees,classroom_id," . $id,
            'academic_year' => "required",
            'notes'         => "required"
        ]);

        $fee = Fee::findOrFail($id);
        $fee->name = ['ar' => $request->ar_fees, 'en' => $request->en_fees];
        $fee->amount = $request->fee_amount;
        $fee->grade_id = $request->grades;
        $fee->classroom_id = $request->classrooms;
        $fee->academic_year = $request->academic_year;
        $fee->notes = $request->notes;
        $fee->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('fees.index');
    }
    public function destroy($id){
        Fee::findOrFail($id)->delete();
        toastr()->success(__('site.deleted_successfully'));
        return redirect()->route('fees.index');
    }
}
