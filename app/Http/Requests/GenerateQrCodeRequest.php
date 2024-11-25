<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateQrCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string|in:website,secure-website,email,phone-number,sms,sms-message,sms-message-number,geo,mecard,vcard,wifi',
            'url' => 'nullable|string|url:http|required_if:type,website',
            'secure_url' => 'nullable|string|url:https|required_if:type,secure-website',
            'email' => 'nullable|email|required_if:type,email',
            'phone' => 'nullable|string|required_if:type,phone-number',
            'sms_phone' => 'nullable|string|required_if:type,sms,sms-message-number',
            'sms_message' => 'nullable|string|required_if:type,sms-message,sms-message-number',
            'latitude' => ['nullable', 'required_if:type,geo', 'regex:/^-?([1-8]?[0-9](\.\d+)?|90(\.0+)?)$/'],
            'longitude' => ['nullable', 'required_if:type,geo', 'regex:/^-?((1[0-7][0-9]|[1-9]?[0-9])(\.\d+)?|180(\.0+)?)$/'],
        ];
    }
}
