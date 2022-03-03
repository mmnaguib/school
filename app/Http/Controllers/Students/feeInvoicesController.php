<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Repository\FeeInvoices\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class feeInvoicesController extends Controller
{
    protected $feeInvoice;
    public function __construct(FeeInvoicesRepositoryInterface $feeInvoice)
    {
        $this->feeInvoice = $feeInvoice;
    }
    public function index()
    {
        return $this->feeInvoice->index();
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        return $this->feeInvoice->store($request);
    }
    public function show($id)
    {
        return $this->feeInvoice->show($id);
    }
    public function edit($id)
    {
        return $this->feeInvoice->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->feeInvoice->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->feeInvoice->destroy($id);
    }
}
