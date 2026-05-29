<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Public endpoint
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:20', 'regex:/^01[0-9]-[0-9]{7,8}$/'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:20', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama diperlukan.',
            'name.max'          => 'Nama maksimum 100 aksara.',
            'email.required'    => 'Emel diperlukan.',
            'email.email'       => 'Format emel tidak sah.',
            'email.max'         => 'Emel maksimum 150 aksara.',
            'phone.regex'       => 'Format telefon tidak sah. Gunakan format: 012-3456789.',
            'subject.required'  => 'Subjek diperlukan.',
            'subject.max'       => 'Subjek maksimum 200 aksara.',
            'message.required'  => 'Mesej diperlukan.',
            'message.min'       => 'Mesej mesti minimum 20 aksara.',
            'message.max'       => 'Mesej maksimum 5000 aksara.',
        ];
    }
}
