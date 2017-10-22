<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Filters\Course\CourseFilters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return Course::with(['subjects', 'users'])->latest()->filter($request)->get();
    }
}
