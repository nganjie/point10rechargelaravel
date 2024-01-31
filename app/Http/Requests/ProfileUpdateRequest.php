<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Client;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            "numero"=>["required","int"],
            "ville"=>["required","string"],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Client::class)->ignore($this->user()->id)],
        ];
    }
}
