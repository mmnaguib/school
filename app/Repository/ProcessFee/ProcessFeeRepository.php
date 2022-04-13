<?php

namespace App\Repository\ProcessFee;

use App\Models\processFee;
use App\Models\Student;
use App\Models\student_account;
use Exception;
use Illuminate\Support\Facades\DB;

class ProcessFeeRepository implements ProcessFeeRepositoryInterface {

    public function index() {
        $process_fees = processFee::all();
        return view('pages.processingFee.index', compact('process_fees'));
    }
    public function edit($id) {
        $processFee = processFee::findOrFail($id);
        return view('pages.processingFee.edit', compact('processFee'));
    }
    public function show($id) {
        $student = Student::findOrFail($id);
        return view('pages.processingFee.add', compact('student'));
    }
    public function store($request) {
        DB::beginTransaction();
        try{
            $process_fee = new processFee();
            $process_fee->date = date('Y-m-d');
            $process_fee->student_id = $request->student_id;
            $process_fee->amount = $request->debit;
            $process_fee->description = $request->description;
            $process_fee->save();

            $student_account = new student_account();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipt';
            $student_account->process_id = $process_fee->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->student_id = $request->student_id;
            $student_account->save();

        DB::commit();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('processesFee.index');

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request, $id) {
        DB::beginTransaction();
        try{
            $process_fee = processFee::findOrFail($id);
            $process_fee->date = date('Y-m-d');
            $process_fee->student_id = $request->student_id;
            $process_fee->amount = $request->debit;
            $process_fee->description = $request->description;
            $process_fee->save();

            $student_account = student_account::where('process_id', $id)->first();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipt';
            $student_account->process_id = $process_fee->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $process_fee->description = $request->description;
            $student_account->student_id = $request->student_id;
            $student_account->save();

        DB::commit();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('processesFee.index');

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id) {
        processFee::findOrFail($id)->delete();
        return redirect()->back();
    }
}
