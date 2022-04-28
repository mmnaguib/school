<?php

namespace App\Http\Controllers;

use App\Repository\Qizzes\QuizzRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quiz;
    public function __construct(QuizzRepositoryInterface $quiz)
    {
        $this->quiz = $quiz;
    }
    public function index()
    {
        return $this->quiz->index();
    }
    public function create()
    {
        return $this->quiz->create();
    }
    public function store(Request $request)
    {
        return $this->quiz->store($request);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return $this->quiz->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->quiz->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->quiz->destroy($id);
    }
}
