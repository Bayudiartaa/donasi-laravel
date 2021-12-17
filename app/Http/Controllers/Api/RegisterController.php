<?php

namespace App\Http\Controllers\Api;

use App\Models\Donatur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(RegisterRequest $request)
    {
        //set validasi
        // $validator = Validator::make($request->all(), [
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        //create donatur
        $donatur = Donatur::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password,)
        ]);
        
        //return JSON
        return response()->json([
            'success' => true,
            'message' => 'Register Berhasil!',
            'data'    => $donatur,
            'token'   => $donatur->createToken('authToken')->accessToken  
        ], 201);
    }
}
