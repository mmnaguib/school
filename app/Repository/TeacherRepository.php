<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;


class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers() {
        return Teacher::all();
    }
    public function getAllSpecializations() {
        return Specialization::all();
    }
    public function getAllGenders() {
        return Gender::all();
    }
    public function storeTeachers($request) {

        $request->validate([
            'email'             => 'required|unique:teachers,email',
            'password'          => 'required|min:8',
            'ar_name'           => 'required',
            'en_name'           => 'required',
            'specialization'    => 'required',
            'gender'            => 'required',
            'joining_date'      => 'required',
            'address'           => 'required',
        ]);
        $teacher = new Teacher();
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $teacher->specialization_id  = $request->specialization;
        $teacher->gender_id = $request->gender;
        $teacher->joining_date = $request->joining_date;
        $teacher->address = $request->address;
        $teacher->save();
    }

    public function getTeacher($id){
        return Teacher::findOrFail($id);
    }
    public function updateTeachers($request, $id) {
        $request->validate([
            'email'             => 'required|unique:teachers,email,' . $id,
            'password'          => 'required|min:8',
            'ar_name'           => 'required',
            'en_name'           => 'required',
            'specialization'    => 'required',
            'gender'            => 'required',
            'joining_date'      => 'required',
            'address'           => 'required',
        ]);
        $teacher = Teacher::find($id);
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->name = ['ar' => $request->ar_name, 'en' => $request->en_name];
        $teacher->specialization_id  = $request->specialization;
        $teacher->gender_id = $request->gender;
        $teacher->joining_date = $request->joining_date;
        $teacher->address = $request->address;
        $teacher->save();
    }
}
