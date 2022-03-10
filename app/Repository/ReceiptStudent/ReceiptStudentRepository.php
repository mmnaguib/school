<?php

namespace App\Repository\ReceiptStudent;

use App\Models\FundAccount;
use App\Models\Student;
use App\Models\ReceipeStudent;
use App\Models\student_account;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{

    public function index(){
        $receipes = ReceipeStudent::all();
        return view('pages.receipts.index', compact('receipes'));
    }

    public function store($request){

        DB::beginTransaction();
        try{

        $request->validate([
            'amount'             => 'required',
            'description'        => 'required',
            ]);

            $receipe = new ReceipeStudent();
            $receipe->date = date('Y-m-d');
            $receipe->student_id = $request->student_id;
            $receipe->debit = $request->amount;
            $receipe->description = $request->description;
            $receipe->save();

            $fund_account = new FundAccount();
            $fund_account->date = date('Y-m-d');
            $fund_account->receipe_id = $receipe->id;
            $fund_account->debit = $request->amount;
            $fund_account->credit = 0.00;
            $fund_account->description = $request->description;
            $fund_account->save();

            $student_account = new student_account();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipe';
            $student_account->student_id = $request->student_id;
            $student_account->fee_invoice_id = null;
            $student_account->receipe_id = $receipe->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->amount;
            $student_account->description = $request->description;
            $student_account->save();
            DB::commit();
            toastr()->success(__('site.added_successfully'));
            return redirect()->route('receipts.index');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors(['error', $e->getMessage()]);
        }
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return view('pages.receipts.add', compact('student'));
    }

    public function edit($id){
        $receipt = ReceipeStudent::findOrFail($id);
        return view('pages.receipts.edit', compact('receipt'));
    }

    public function update($request, $id){
        DB::beginTransaction();
        try{

        $request->validate([
            'amount'             => 'required',
            'description'        => 'required',
            ]);

            $receipe = ReceipeStudent::findOrFail($id);
            $receipe->date = date('Y-m-d');
            $receipe->student_id = $request->student_id;
            $receipe->debit = $request->amount;
            $receipe->description = $request->description;
            $receipe->save();

            $fund_account = FundAccount::where('receipe_id', $id)->first();
            $fund_account->date = date('Y-m-d');
            $fund_account->receipe_id = $receipe->id;
            $fund_account->debit = $request->amount;
            $fund_account->credit = 0.00;
            $fund_account->description = $request->description;
            $fund_account->save();

            $student_account = student_account::where('receipe_id', $id)->first();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipe';
            $student_account->student_id = $request->student_id;
            $student_account->fee_invoice_id = null;
            $student_account->receipe_id = $receipe->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->amount;
            $student_account->description = $request->description;
            $student_account->save();
            DB::commit();
            toastr()->success(__('site.updated_successfully'));
            return redirect()->route('receipts.index');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors(['error', $e->getMessage()]);
        }
    }

    public function destroy($id){
        ReceipeStudent::findOrFail($id)->delete();
        toastr()->success(__('site.deleted_successfully'));
        return redirect()->route('receipts.index');
    }
}
