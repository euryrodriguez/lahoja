<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $all = Universidad::all();
        return view('index')->with('universities', $all);
    }
}
