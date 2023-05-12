<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

final class TodoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'done' => 'required|bool'
        ];
    }
}
