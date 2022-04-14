<?php

namespace App\Repository\Attendance;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepository implements AttendanceRepositoryInterface {
    public function index(){

        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Attendance.index',compact('Grades','list_Grades','teachers'));
    }

    public function store($request){
        foreach ($request->attendences as $studentid => $attendence) {
            if( $attendence == 'presence' ) {
                $attendence_status = true;
            } else if( $attendence == 'absent' ){
                $attendence_status = false;
            }
            $attendance = new Attendance();
            $attendance->student_id = $studentid;
            $attendance->grade_id = $request->grade_id;
            $attendance->classroom_id = $request->classroom_id;
            $attendance->section_id = $request->section_id;
            $attendance->teacher_id = 1;
            $attendance->attendance_date = date('Y-m-d');
            $attendance->attendance_status = $attendence_status;
            $attendance->save();
        }
    toastr()->success(__('site.save'));
    return redirect()->back();
    }

    public function edit($id){
    }

    public function update($request, $id){

    }

    public function show($id){
        $students = Student::with('attendance')->where('section_id', $id)->get();
        return view('pages.Attendance.takeattendance',compact('students'));
    }

    public function destroy($id){

    }
}
