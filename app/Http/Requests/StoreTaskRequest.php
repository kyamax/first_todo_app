<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => ['max:255'],
            'title' => ['required', 'max:255'],
            'importance_id' => ['required', 'exists:importances,id'],
            'check' => ['boolean'],

        ];
    }
}
