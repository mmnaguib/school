<?php
namespace App\Repository\Students;

use App\Models\Student;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Parents;
use App\Models\class_room;
use App\Models\Section;
use Exception;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface{

    public function getAllStudents() {
        return Student::all();
    }

    public function createStudent() {
        $data['grades'] = Grade::all();
        $data['parents'] = Parents::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['bloods'] = BloodType::all();
        $data['class_rooms'] = class_room::all();
        $data['sections'] = Section::all();
        return view('pages.students.create', $data);
    }
    public function storeStudents($request) {

        $request->validate([
            'email'             => 'required|unique:teachers,email',
            'password'          => 'required|min:8',
            'ar_student_name'   => 'required',
            'en_student_name'   => 'required',
            'nationality'       => 'required',
            'gender'            => 'required',
            'nationality'       => 'required',
            'date_bithday'      => 'required',
            'grade'             => 'required',
            'classroom'         => 'required',
            'parent'            => 'required',
            'section'           => 'required',
            'bloodType'         => 'required',
            'academic_year'     => 'required',
        ]);
        $student = new Student();
        $student->name = ['ar' => $request->ar_student_name, 'en' => $request->en_student_name];
        $student->email = $request->email;
        $student->password = $request->password;
        $student->gender_id  = $request->gender;
        $student->nationality_id  = $request->nationality;
        $student->blood_id = $request->bloodType;
        $student->birthdate = $request->date_bithday;
        $student->grade_id   = $request->grade;
        $student->classroom_id   = $request->classroom;
        $student->section_id  = $request->section;
        $student->parent_id  = $request->parent;
        $student->academic_year  = $request->academic_year;
        $student->save();
    }
}