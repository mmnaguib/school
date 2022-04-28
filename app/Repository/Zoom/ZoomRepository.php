<?php

namespace App\Repository\Zoom;

use App\Models\Grade;
use App\Models\Zoom;
use Illuminate\Support\Facades\Auth;

class ZoomRepository implements ZoomRepositoryInterface {
    public function index(){
        $zooms = Zoom::get();
        return view('pages.Zoom.index', compact('zooms'));
    }
    public function create(){
        $grades = Grade::get();
        return view('pages.Zoom.create', compact('grades'));
    }
    public function store($request){
        
    }
    public function edit($id){

    }
    public function update($request, $id){

    }
    public function destroy($id){

    }
}
