<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\District;
use App\Models\Division;
use App\Models\Exam;
use App\Models\Upazilla;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function regForm(){
        $exam = $this->examList();
        $board = $this->boardList();
        $division = $this->divisionList();
        return view('regform',compact('exam','board','division'));
    }

    public function examList(){
        return Exam::all();
    }

    public function boardList(){
        return Board::all();
    }

    public function divisionList(){
        return Division::all();
    }

    public function districtList($id){
        return District::where('division_id','=',$id)->get();
    }

    public function upozilaList($id){
        return Upazilla::where('district_id','=',$id)->get();
    }
}
