<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    // Answers- 1 & 2
    public function users_information(Request $request)
    {
        $name = $request->input('name');
        $userAgent = $request->header('User-Agent');

        return "name: ${name}, user-agent: ${userAgent}";
    }


    public function page_query(Request $request)
    {
        $page = $request->query('page', null);
        return $page;
    }

    public function json_response():JsonResponse
    {

        $mes = "success";
        $data = [
            "name"=>"John Doe",
            "age"=>25
        ];

        return response()->json([
            "message" => $mes,
            "data"=> $data
        ]);
    }


    public function file_upload(Request $request)
    {
        $files = $request->file('avatar');
        $files->move(public_path('/uploads'), $files->getClientOriginalName());

        return "ok";
    }


    public function add_cookie(Request $request)
    {
        $rememberToken = $request->cookie('remember_token', null);

        return $rememberToken;
    }


    public function submit_email(Request $request):JsonResponse
    {
        $email = $request->input('email');
        return response()->json([
            "success" => true,
            "message" => "Form submitted successfully."
        ]);
    }
}
