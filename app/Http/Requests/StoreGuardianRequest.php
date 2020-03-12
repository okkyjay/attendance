<?php

namespace App\Http\Requests;

use App\Guardian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreGuardianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guardian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'        => [
                'required',
            ],
            'surname'      => [
                'required',
            ],
            'initials'     => [
                'required',
            ],
            'email'        => [
                'required',
                'unique:guardians',
            ],
            'phone_number' => [
                'required',
            ],
        ];
    }
}
