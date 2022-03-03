<?php
namespace App\Repository\FeeInvoices;

interface FeeInvoicesRepositoryInterface {
    public function index();

    public function show($id);

    public function store($request);

    public function edit($id);

    public function update($request ,$id);

    public function destroy($id);
}
