<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function getImagenesCollection()
    {
        $all = Imagen::all();

        echo json_encode([
            'imagenes' => $all,
            'result' => 1
        ]);
    }
}
