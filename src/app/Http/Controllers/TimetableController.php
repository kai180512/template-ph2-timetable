<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(){
       $courses1 = DB::select('
       SELECT period, name, teacher, room FROM courses

       WHERE day = ?

       ORDER BY period',
       ['1']
       ); 
       $courses2 = DB::select('
       SELECT name, credits FROM courses

       WHERE required = true

       ORDER BY code
       ');

       return view('timetable', [
        'courses1' => $courses1,
        'courses2' => $courses2,
       ]);
    }
}
