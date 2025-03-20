<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClickRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.web_sites_id' => 'required|exists:web_sites,id',
            '*.url' => 'required|url',
            '*.x' => 'required|integer',
            '*.y' => 'required|integer',
            '*.window_width' => 'required|integer',
            '*.window_height' => 'required|integer',
            '*.document_width' => 'required|integer',
            '*.document_height' => 'required|integer',
        ];
    }
}
