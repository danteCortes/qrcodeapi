<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contracts\IQrCodeService;
use App\DTOs\GenerateQrCodeDTO;
use App\Http\Requests\GenerateQrCodeRequest;

class QrCodeController extends Controller
{
    protected $qrCodeService;

    public function __construct(IQrCodeService $qrCodeService)
    {
        $this->qrCodeService = $qrCodeService;
    }

    public function generate(GenerateQrCodeRequest $request): \Illuminate\Http\Response
    {
        try {
            return $this->qrCodeService->generate(new GenerateQrCodeDTO($request));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
