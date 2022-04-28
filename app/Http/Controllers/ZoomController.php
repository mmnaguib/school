<?php

namespace App\Http\Controllers;

use App\Repository\Zoom\ZoomRepositoryInterface;
use Illuminate\Http\Request;

class ZoomController extends Controller
{
    protected $zoom;
    public function __construct(ZoomRepositoryInterface $zoom)
    {
        $this->zoom = $zoom;
    }
    public function index()
    {
        return $this->zoom->index();
    }
    public function create()
    {
        return $this->zoom->create();
    }
    public function store(Request $request)
    {
        return $this->zoom->store($request);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return $this->zoom->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->zoom->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->zoom->destroy($id);
    }
}
