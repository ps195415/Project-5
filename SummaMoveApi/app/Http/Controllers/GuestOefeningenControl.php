<?php

namespace App\Http\Controllers;

use App\Models\Oefeningen;
use Illuminate\Http\Request;

class GuestOefeningenControl extends Controller
{
    //
    function index()
    {
        try {
            $content = [
                'status' => true,
                'data' => Oefeningen::All(),
            ];
            return response()->json($content, 200);
        } catch (\Throwable $th) {
            $content = [
                'status' => false,
                'data' => null,
            ];
            return response()->json($content, 400);
        }
    }
}
