<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudent\ReceiptStudentRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $receipe;
    public function __construct(ReceiptStudentRepositoryInterface $receipe){
        $this->receipe = $receipe;
    }
    public function index(){
        return $this->receipe->index();
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
    public function store(Request $request){
        return $this->receipe->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return $this->receipe->show($id);
    }
    public function edit($id){
        return $this->receipe->edit($id);
    }
    public function update(Request $request, $id){
        return $this->receipe->update($request, $id);
    }
    public function destroy($id){
        return $this->receipe->destroy($id);
    }
}
