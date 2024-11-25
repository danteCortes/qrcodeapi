<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

use App\Http\Requests\GenerateQrCodeRequest;

class QrCodeController extends Controller
{
    public function generate(GenerateQrCodeRequest $request)
    {
        try {
            // URL que deseas codificar en el QR
            $url = $request->input('url');
            $type = $request->input('type');
    
            // Generar el código QR como una imagen PNG
            $qrImage = QrCode::format('png')
                ->size(300)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->margin(1)
                ->generate("MECARD:N:Juan Pérez;TEL:123456789;EMAIL:juan@example.com;ADR:123 Calle Principal, Ciudad;URL:https://example.com;;
")
            ;
    
            // Retornar el archivo para descarga
            return Response::make($qrImage, 200, [
                'Content-Type' => 'image/png',
                'Content-Disposition' => "attachment; filename=\"qrCode.png\"",
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
