<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{

//add doctor
    public function addDoctor(Request $request){
            $rules = [
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    'unique:doctors,email',
                    function($attribute, $value, $fail){
                        if(
                            User::where('email', $value)->exists()||
                            Admin::where('email', $value)->exists()||
                            Doctor::where('email', $value)->exists()
                        )
                            $fail('email is already registered'); }
                ],

                'password' => 'required|min:6',
                'speciality' => 'required',
                'phone' => 'required|min:11|max:11|unique:doctors,phone',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }
            Doctor::create([
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>bcrypt($request->get('password')),
                'speciality'=>$request->get('speciality'),
                'phone'=>$request->get('phone','null'),
            ]);
            return response()->json('doctor is created successfully!');
    }

//show all doctors
    public function showDoctors(){
        $doctors=Doctor::all();
        return response()->json($doctors);
    }

//delete specified doctor
    public function deleteDoctor(Request $request){
        $doctorId=Doctor::find( $request->get('id') );

        if($doctorId){
            $doctorId->delete();
            return response()->json('doctor data is deleted successfully!');
        }
        return response()->json('doctor not found!');
    }

//show all patients
    public function showPatients(){
        $patients=User::all();
        return response()->json($patients);
    }

//show all payments operations
    public function showPayments(){
        $payments=Payment::all();
        return response()->json($payments);
    }

}
