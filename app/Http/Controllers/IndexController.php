<?php

namespace App\Http\Controllers;

use App\Models\Font;
use App\Models\Imagen;
use App\Models\Universidad;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($acronym = null)
    {
        $fonts = Font::all();
        $universities = Universidad::all();

        if (null == $acronym) {
            return view('index')
                ->with('fonts', $fonts)
                ->with('universities', $universities);
        } else {

            $university = Universidad::where('acronym', '=', $acronym)->first();

            if (null != $university) {

                $id = $university->id;

                $imagen = Imagen::where('universityId', '=', $id)->first();

                if(null != $imagen){
                    return view('index')
                        ->with('acronym', $acronym)
                        ->with('fonts', $fonts)
                        ->with('universities', $universities)
                        ->with('name', $university->name)
                        ->with('imagen', $imagen->filename)
                        ->with('width', $imagen->width)
                        ->with('height', $imagen->height);
                }else{
                    return redirect()->route('index.welcome');
                }
            }

            return redirect()->route('index.welcome');
        }

    }

    public function getDocument($output, Request $request)
    {
        $fonts = Font::all();
        $params = $request->all();

        switch ($output) {
            case 'docx':
                $view = view('outputs.docx')
                    ->with('params', $params)
                    ->with('fonts', $fonts)
                    ->render();
                break;
            case 'print':
                $view = view('outputs.print')
                    ->with('params', $params)
                    ->with('fonts', $fonts)
                    ->render();
                break;
            default:
                $view = view('outputs.print')
                    ->with('fonts', $fonts)
                    ->with('params', $params)
                    ->render();
                break;
        }

        return response()->json(array('view' => $view, 'result' => 1));
    }
}
