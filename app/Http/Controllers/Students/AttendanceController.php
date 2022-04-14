<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\Attendance\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendance;
    public function __construct(AttendanceRepositoryInterface $attendance)
    {
        return $this->attendance = $attendance;
    }
    public function index()
    {
        return $this->attendance->index();
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }
    public function show($id)
    {
        return $this->attendance->show($id);
    }
    public function edit($id)
    {
        return $this->attendance->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->attendance->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->attendance->destroy($id);
    }
}
