<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Education;
use App\Models\Training;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    public function registerApplicant(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'address' => 'required',
            'training' => 'required',
            'exam' => 'required',
            'institute' => 'required',
            'board' => 'required',
            'result' => 'required',
            'photo' => ['required','mimes:jpg,png,jpeg'],
            'cv' => ['required','mimes:pdf,docx']
        ]);

        if($validator->fails()){
            Session::put('msg','<h3 style="color:red"> Sorry! validation failed. </h3>');
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $photo_path = null;
            $cv_path = null;

            if($request->file('photo')){
                $file= $request->file('photo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('image'), $filename);
                $photo_path = 'image/'.$filename;
            }

            if($request->file('cv')){
                $file= $request->file('cv');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('cv'), $filename);
                $cv_path = 'cv/'.$filename;
            }

            $bangla = ($request->input('bangla') !== null) ? $request->input('bangla'): 0;
            $english = ($request->input('english') !== null) ? $request->input('english'): 0;
            $french = ($request->input('french') !== null) ? $request->input('french'): 0;
            $training = $request->input('training');
            $exam = $request->input('exam');
            $institute = $request->input('institute');
            $board = $request->input('board');
            $result = $request->input('result');
            $trainingName = $request->input('trainingName');
            $trainingDetails = $request->input('trainingDetails');

            $data = [
                'name'        => $request->input('name'),
                'email'       => $request->input('email'),
                'division_id' => $request->input('division_id'),
                'district_id' => $request->input('district_id'),
                'upazila_id'  => $request->input('upazila_id'),
                'address'     => $request->input('address'),
                'training'    => $training,
                'bangla'      => $bangla,
                'english'     => $english,
                'french'      => $french,
                'photo'       => $photo_path,
                'cv'          => $cv_path,
            ];

            DB::beginTransaction();
            try {
                $applicant = Applicant::create($data);

                for($i = 0; count($exam) > $i; $i++){
                    Education::create([
                                'applicant_id' => $applicant->id,
                                'exam_id' => $exam[$i],
                                'institute' => $institute[$i],
                                'board_id' => $board[$i],
                                'result' => $result[$i],
                            ]);
                }

                if($training == 1){
                    for($i = 0; count($trainingName) > $i; $i++){
                        Training::create([
                            'applicant_id' => $applicant->id,
                            'trainingName' => $trainingName[$i],
                            'trainingDetails' => $trainingDetails[$i],
                        ]);
                    }
                }

                DB::commit();
            }catch(Exception $e){
                DB::rollback();
                Session::put('msg','<h3 style="color:red"> Sorry! Registration failed. </h3>');
                return Redirect::back()->withErrors($e)->withInput();
            }

            if($applicant){
                Session::put('msg','<h3 style="color:green"> Registration Successful. </h3>');
                return Redirect::back();
            }
        }
    }
}
