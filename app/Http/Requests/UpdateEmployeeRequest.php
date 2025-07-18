<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $employeeId = $this->route('id');

        return [
            'name'  => ['sometimes', 'string', 'max:255'],
            // Mevcut kayıt hariç benzersizlik kontrolü
            'email' => ['sometimes', 'email', 'unique:employees,email,' . $employeeId],
        ];
    }
}
