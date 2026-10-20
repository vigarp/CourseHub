<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Course::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $courses = $query->orderBy('id', 'asc')->get();
        $categories = Course::select('category')->distinct()->pluck('category');

        return view('courses.index', compact('courses', 'categories', 'category'));
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $relatedCourses = Course::where('id', '!=', $id)
            ->where('category', $course->category)
            ->take(3)
            ->get();

        if ($relatedCourses->isEmpty()) {
            $relatedCourses = Course::where('id', '!=', $id)->take(3)->get();
        }

        return view('courses.show', compact('course', 'relatedCourses'));
    }
}
