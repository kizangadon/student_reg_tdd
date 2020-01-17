<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(){
        Student::create(request()->only([
            'firstname',
            'lastname',
            'dob',
            'gender'
        ]));

        $path = "student.index";

        return redirect($path);
    }
}
