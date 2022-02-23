<?php
namespace App\Repository\Students;

use App\Models\Student;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Parents;
use App\Models\class_room;
use App\Models\Image;
use App\Models\Section;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'email'             => 'required|unique:students,email',
            'password'          => 'required|min:8',
            'ar_student_name'   => 'required',
            'en_student_name'   => 'required',
            'nationality'       => 'required',
            'gender'            => 'required',
            'nationality'       => 'required',
            'date_bithday'      => 'required',
            'grades'            => 'required',
            'classrooms'        => 'required',
            'parent'            => 'required',
            'sections'          => 'required',
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
        $student->grade_id   = $request->grades;
        $student->classroom_id   = $request->classrooms;
        $student->section_id  = $request->sections;
        $student->parent_id  = $request->parent;
        $student->academic_year  = $request->academic_year;
        $student->save();
        if($request->hasfile('photos')){
            foreach($request->file('photos') as $file){
                $filename = $file->getClientOriginalName();
                $file->storeAs($student->name, $file->getClientOriginalName(), $disk = 'student_attachements');

                $image = new Image();
                $image->file_name = $filename;
                $image->imageable_id = $student->id;
                $image->imageable_type = 'App\Models\Student';
                $image->save();
            }
        }

    }

    public function showStudent($id){
        $student = Student::findOrFail($id);
        return view('pages.students.show', compact('student'));
    }

    public function editStudent($id) {
        $data['grades'] = Grade::all();
        $data['parents'] = Parents::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['bloods'] = BloodType::all();
        $data['class_rooms'] = class_room::all();
        $data['sections'] = Section::all();
        $student = Student::findOrFail($id);
        return view('pages.students.edit', $data, compact('student'));
    }

    public function updateStudent($request, $id) {
        $request->validate([
            'email'             => 'required|unique:students,email,' . $id,
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
        $student = Student::findOrFail($id);
        $student->name = ['ar' => $request->ar_student_name, 'en' => $request->en_student_name];
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
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

    public function deleteStudent($id){
        Student::findOrFail($id)->delete();
    }

    public function uploadAttachment($request){
        foreach($request->file('photos') as $file){
            $filename = $file->getClientOriginalName();
            $file->storeAs($request->student_name, $file->getClientOriginalName(), $disk = 'student_attachements');

            $image = new Image();
            $image->file_name = $filename;
            $image->imageable_id = $request->student_id;
            $image->imageable_type = 'App\Models\Student';
            $image->save();
        }
            toastr()->success(__('site.updated_successfully'));
            return redirect()->route('students.show', $request->student_id);
    }

    public function download_attachment($student_name, $file_name){
        return response()->download(public_path('images/students/' . $student_name . '/' . $file_name));
    }


    public function delete_attachment($request, $id){
        Storage::disk('student_attachements')->delete($request->student_name . '/' . $request->file_name);
        Image::where('id', $id)->where('file_name', $request->file_name)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('students.show', $request->student_id);
    }

}
