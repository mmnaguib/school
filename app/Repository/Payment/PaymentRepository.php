<?php
namespace App\Repository\Payment;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\student_account;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface {

    public function index() {
        $payments = PaymentStudent::all();
        return view('pages.Payment.index', compact('payments'));
    }
    public function edit($id) {
        $payment = PaymentStudent::findOrFail($id);
        return view('pages.Payment.edit', compact('payment'));
    }
    public function show($id) {
        $student = Student::findOrFail($id);
        return view('pages.Payment.add', compact('student'));
    }
    public function store($request) {

        DB::beginTransaction();
        try{
            $payment = new PaymentStudent();
            $payment->date = date('Y-m-d');
            $payment->student_id = $request->student_id;
            $payment->amount = $request->debit;
            $payment->description = $request->description;
            $payment->save();

            $fund_account = new FundAccount();
            $fund_account->date = date('Y-m-d');
            $fund_account->payment_id = $payment->id;
            $fund_account->debit = 0.00;
            $fund_account->credit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();

            $student_account = new student_account();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'payment';
            $student_account->student_id = $request->student_id;
            $student_account->payment_id = $payment->id;
            $student_account->debit =  $request->debit;
            $student_account->credit = 0.00;
            $student_account->description = $request->description;
            $student_account->save();

        DB::commit();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('payment_students.index');

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request, $id) {
        DB::beginTransaction();
        try{
            $payment = PaymentStudent::findOrFail($id);
            $payment->date = date('Y-m-d');
            $payment->student_id = $request->student_id;
            $payment->amount = $request->debit;
            $payment->description = $request->description;
            $payment->save();

            $fund_account = FundAccount::where('payment_id', $id)->first();
            $fund_account->date = date('Y-m-d');
            $fund_account->payment_id = $payment->id;
            $fund_account->debit = 0.00;
            $fund_account->credit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();

            $student_account = student_account::where('payment_id', $id)->first();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'payment';
            $student_account->student_id = $request->student_id;
            $student_account->payment_id = $payment->id;
            $student_account->debit =  $request->debit;
            $student_account->credit = 0.00;
            $student_account->description = $request->description;
            $student_account->save();

        DB::commit();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('payment_students.index');

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id) {
        PaymentStudent::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->back();
    }
}
