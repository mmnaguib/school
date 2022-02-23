<?php
namespace App\Repository\Promotions;

use App\Models\class_room;
use App\Models\Grade;
use App\Models\Promotions;
use App\Models\Section;
use App\Models\Student;

class PromotionRepository implements PromotionRepositoryInterface {

    public function index() {
        $promotions = Promotions::all();
        return view('pages.students.promotions.index', compact('promotions'));
    }

    public function storePromotion($request) {
        $students = student::where('grade_id', $request->grades)
        ->where('classroom_id', $request->classrooms)
        ->where('section_id', $request->sections)
        ->where('academic_year', $request->academic_year)
        ->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
        }
        foreach($students as $student){
            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)
                ->update([
                    'grade_id'=>$request->grades_new,
                    'classroom_id'=>$request->classrooms_new,
                    'section_id'=>$request->sections_new,
                    'academic_year'=>$request->academic_year_new,
                ]);
            Promotions::updateOrCreate([
                'student_id'=>$student->id,
                'from_grade'=>$request->grades,
                'from_classroom'=>$request->classrooms,
                'from_section'=>$request->sections,
                'to_grade'=>$request->grades_new,
                'to_classroom'=>$request->classrooms_new,
                'to_section'=>$request->sections_new,
                'academic_year'=>$request->academic_year,
                'academic_year_new'=>$request->academic_year_new,
            ]);
        }
            toastr()->success(__('site.added_successfully'));
            return redirect()->route('promotions.index');
    }

    public function create() {
        $grades = Grade::all();
        return view('pages.students.promotions.management', compact('grades'));
    }

    public function destroy($request){
        if($request->page_id == 1){
            $Promotions = Promotions::all();
            foreach ($Promotions as $promotion){

                $ids = explode(',', $promotion->student_id);
                Student::whereIn('id', $ids)->update([
                    'grade_id'=>$promotion->from_grade,
                    'classroom_id'=>$promotion->from_classroom,
                    'section_id'=> $promotion->from_section,
                    'academic_year'=>$promotion->academic_year,
                ]);

                Promotions::truncate();
            }
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
        }else{
            $promotion = Promotions::findOrFail($request->id);
            Student::where('id', $promotion->student_id)->update([
                'grade_id'      => $promotion->from_grade,
                'classroom_id'  => $promotion->from_classroom,
                'section_id'    => $promotion->from_section,
                'academic_year' => $promotion->academic_year,
            ]);

            $promotion::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
    }
}
