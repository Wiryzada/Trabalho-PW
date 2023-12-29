<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseEditRequest;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::all();

        foreach ($data as $course) {
            $course->institution_name = Institution::find($course->institution_id)->name;
        }

        return view('course.index', [
            'courses' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create', [
            'institutions' => Institution::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCreateRequest $request)
    {
        $data = $request->validated();

        $course = Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        return view('course.edit', [
            'course' => $course,
            'institutions' => Institution::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseEditRequest $request, string $id)
    {
        //
        $data = $request->validated();

        $course = Course::findOrFail($id);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso excluído com sucesso!');
    }
}
