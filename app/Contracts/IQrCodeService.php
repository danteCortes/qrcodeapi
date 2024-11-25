<?php

namespace App\Contracts;

use App\DTOs\GenerateQrCodeDTO;

use Illuminate\Http\Response;

interface IQrCodeService
{
    public function generate(GenerateQrCodeDTO $dto): Response;
}