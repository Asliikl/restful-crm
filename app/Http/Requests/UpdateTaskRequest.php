<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'  => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,in_progress,completed'],
        ];
    }
}
