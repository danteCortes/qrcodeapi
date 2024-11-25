<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class GenerateQrCodeDTO
{
    public string $text;

    public function __construct(Request $request)
    {
        $this->text = $request->text;
    }
}