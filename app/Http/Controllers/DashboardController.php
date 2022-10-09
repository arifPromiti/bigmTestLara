<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Board;
use App\Models\Division;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $exam = $this->examList();
        $board = $this->boardList();
        $division = $this->divisionList();
        return view('dashboard',compact('exam','board','division'));
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

    public function getApplicant(Request $request){
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];


        $totalRecords = Applicant::all()->count();

        $totalRecordswithFilter = DB::table('applicants as a')
                                    ->join('divisions as b','b.id','=','a.division_id')
                                    ->join('districts as c','c.id','=','a.district_id')
                                    ->join('upazillas as d','d.id','=','a.upazila_id')
                                    ->where(function ($query) use ($searchValue) {
                                        $query->where('a.name', 'like', '%'.$searchValue.'%')
                                                ->orWhere('a.email', 'like', '%' . $searchValue.'%')
                                                ->orWhere('a.created_at', 'like', '%'.$searchValue.'%')
                                                ->orWhere('b.division_name', 'like', '%'.$searchValue.'%')
                                                ->orWhere('c.district_name', 'like', '%'.$searchValue.'%')
                                                ->orWhere('d.upazilla_name', 'like', '%'.$searchValue.'%');
                                    })
                                    ->count();

        $records = DB::table('applicants as a')
                        ->join('divisions as b','b.id','=','a.division_id')
                        ->join('districts as c','c.id','=','a.district_id')
                        ->join('upazillas as d','d.id','=','a.upazila_id')
                        ->where(function ($query) use ($searchValue){
                            $query->where('a.name', 'like', '%'.$searchValue.'%')
                                ->orWhere('a.email', 'like', '%' . $searchValue.'%')
                                ->orWhere('a.created_at', 'like', '%'.$searchValue.'%')
                                ->orWhere('b.division_name', 'like', '%'.$searchValue.'%')
                                ->orWhere('c.district_name', 'like', '%'.$searchValue.'%')
                                ->orWhere('d.upazilla_name', 'like', '%'.$searchValue.'%');
                        })
                        ->orderBy($columnName, $columnSortOrder)
                        ->select('a.id',
                                'a.name',
                                'a.email',
                                'a.created_at',
                                'b.division_name',
                                'c.district_name',
                                'd.upazilla_name')
                        ->skip($start)
                        ->take($rowperpage)
                        ->get();

        $data = [];

        foreach ($records as $record) {
            $id = $record->id;

            $data[] = [
                'name' => $record->name,
                'email' => $record->email,
                'division_name' => $record->division_name,
                'district_name' => $record->district_name,
                'upazilla_name' => $record->upazilla_name,
                'created_at' => $record->created_at,
                'action' => '<a type="button" class="btn btn-info" href="javascript:editrow('.$id.');"> Edit</a>',
            ];
        }

        $response = [
            "draw"		=>	intval($draw),
            "recordsTotal"	=>	$totalRecords,
            "recordsFiltered"	=>	$totalRecordswithFilter,
            "data"		=>	$data
        ];

        return $response;
    }
}
