<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CuponController extends Controller
{
    public function show($codigo)
    {
        $cupon = Cupon::where('codigo', $codigo)->first();

        if (!$cupon) {
            return response()->json(['message' => 'Cupón no encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($cupon);
    }

    public function canjear(Request $request, $codigo)
    {
        $cupon = Cupon::where('codigo', $codigo)->first();

        if (!$cupon) {
            return response()->json(['message' => 'Cupón no encontrado'], Response::HTTP_NOT_FOUND);
        }

        if ($cupon->canjeado) {
            return response()->json(['message' => 'El cupón ya ha sido canjeado'], Response::HTTP_BAD_REQUEST);
        }

        if ($cupon->fecha_e < now()) {
            return response()->json(['message' => 'El cupón ha expirado'], Response::HTTP_BAD_REQUEST);
        }

        $cupon->canjeado = true;
        $cupon->save();

        return response()->json(['message' => 'Cupón canjeado con éxito']);
    }
}
