<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Universidad;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($acronym = null)
    {
        $all = Universidad::all();

        if (null == $acronym) {
            return view('index')->with('universities', $all);
        } else {

            $university = Universidad::where('acronym', '=', $acronym)->first();

            if (null != $university) {

                $id = $university->id;
                $imagen = Imagen::where('universityId', '=', $id)->first();

                return view('index')
                    ->with('acronym', $acronym)
                    ->with('universities', $all)
                    ->with('name', $university->name)
                    ->with('imagen', $imagen->filename);
            }

            return redirect()->route('index.welcome');
        }

    }

    public function getDocument($output, Request $request)
    {
        $params = $request->all();

        switch ($output) {
            case 'docx':
                $view = view('outputs.docx')->with('params', $params)->render();
                break;
            case 'print':
                $view = view('outputs.print')->with('params', $params)->render();
                break;
            default:
                $view = view('outputs.print')->with('params', $params)->render();
                break;
        }

        return response()->json(array('view' => $view, 'result' => 1));
    }
}
