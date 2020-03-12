<?php

namespace App\Http\Requests;

use App\Guardian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuardianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guardian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guardians,id',
        ];
    }
}
