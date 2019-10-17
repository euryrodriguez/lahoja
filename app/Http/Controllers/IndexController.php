<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($universityName = NULL)
    {
        $all = Universidad::all();

        if (NULL == $universityName) {
            return view('index')->with('universities', $all);
        } else {
            return view('index')->with('universities', $all)->with('universityName', $universityName);
        }

    }
}
