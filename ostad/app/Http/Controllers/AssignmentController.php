<?php

namespace App\Http\Controllers;

use App\Http\Middleware\registrationMiddleware;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function registration(Request $request){
        User::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
        return response('Data submited successfully!');
    }
    public function RedirectToDashboard(){
        return redirect('/dashboard');
    }

    public function dashboard(){
        return response('Dashboard');
    }

    public function welcomePage(){
        return view('welcome');
    }

    public function profile(Request $request){
       
        return response('you are authenticated users');;
    }

    public function settings(Request $request){
        return response('you are authenticated users');
    }
   
}
