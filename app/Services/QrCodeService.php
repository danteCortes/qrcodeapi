<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

use App\Contracts\IQrCodeService;
use App\DTOs\GenerateQrCodeDTO;

class QrCodeService implements IQrCodeService
{
    public function generate(GenerateQrCodeDTO $dto): \Illuminate\Http\Response
    {
        try {
            $qrImage = QrCode::format('png')
                ->size(300)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->margin(1)
                ->generate($dto->text)
            ;

            return Response::make($qrImage, 200, [
                'Content-Type' => 'image/png',
                'Content-Disposition' => "attachment; filename=\"qrCode.png\"",
            ]);
            
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
