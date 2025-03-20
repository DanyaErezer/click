<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $website = $this->route('webSite');
        return [
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:web_sites,url,' . $website->id
        ];
    }
}
