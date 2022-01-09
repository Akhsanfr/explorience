<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{

    public function index(){
        $user = Auth::id();
        return response()->json([
            'user' => $user
        ]);
    }

}
