<?php

namespace App\Http\Controllers;

use App\Repository\Fee\feeRepositoryInterface;
use Illuminate\Http\Request;

class FeeContorller extends Controller
{
    protected $fee;
    public function __construct(feeRepositoryInterface $fee){
        $this->fee = $fee;
    }
    public function index()
    {
        return $this->fee->index();
    }
    public function create()
    {
        return $this->fee->create();
    }
    public function store(Request $request)
    {
        return $this->fee->store($request);
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
        return $this->fee->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->fee->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->fee->destroy($id);
    }
}
