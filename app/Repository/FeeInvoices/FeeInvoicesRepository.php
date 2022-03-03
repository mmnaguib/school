<?php
namespace App\Repository\FeeInvoices;

use App\Models\Fee;
use App\Models\fee_invoice;
use App\Models\Student;
use App\Models\student_account;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface{

    public function index() {
        $feeInvoices = fee_invoice::all();
        return view('pages.feeInvoices.index', compact('feeInvoices'));
    }
    public function create() {
        return view('pages.feeInvoices.create');
    }
    public function store($request){
        $listfees = $request->listfees;
        foreach($listfees as $list_fee){
            $fee = new fee_invoice();
            $fee->invoice_date = date('Y-m-d');
            $fee->student_id = $list_fee['student_id'];
            $fee->fee_id = $list_fee['fee_type'];
            $fee->grade_id = $request->grade_id;
            $fee->classroom_id = $request->classroom_id;
            $fee->amount = $list_fee['amount'];
            $fee->description = $list_fee['description'];
            $fee->save();

            $studentAccount = new student_account();
            $studentAccount->date = date('Y-m-d');
            $studentAccount->type = 'invoice';
            $studentAccount->fee_invoice_id = $fee->id;
            $studentAccount->student_id = $list_fee['student_id'];
            $studentAccount->debit = $list_fee['amount'];
            $studentAccount->credit = 0.00;
            $studentAccount->description = $list_fee['description'];
            $studentAccount->save();
        }
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('feesInvoices.index');
    }
    public function show($id) {
        $student = Student::findOrFail($id);
        $fees = Fee::where('classroom_id', $student->classroom_id)->get();
        return view('pages.feeInvoices.show', compact('student', 'fees'));
    }
    public function edit($id) {
        $fee_invoice = fee_invoice::findOrFail($id);
        $fees = Fee::where('classroom_id', $fee_invoice->classroom_id)->get();
        return view('pages.feeInvoices.edit', compact('fee_invoice', 'fees'));
    }
    public function update($request, $id){
            $fee = fee_invoice::findOrFail($id);
            $fee->fee_id = $request->fee_type;
            $fee->amount = $request->amount;
            $fee->description = $request->description;
            $fee->save();

            $studentAccount = student_account::where('fee_invoice_id', $id)->first();
            $studentAccount->debit = $request->amount;
            $studentAccount->description = $request->description;
            $studentAccount->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('feesInvoices.index');
    }

    public function destroy($id) {
        fee_invoice::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('feesInvoices.index');
    }
}
