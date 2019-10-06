<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function getImagenesCollection()
    {
        echo json_encode([
            'imagenes' => Imagen::all(),
            'result' => 1
        ]);
    }
}
