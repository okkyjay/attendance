<?php

namespace App\Http\Requests;

use App\Role;
use Gate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRoleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if (\Request::is('api/*')){
            $error = array(
                'error' => $validator->errors()
            );
            throw new HttpResponseException(response()->json($error, 422));
        } else{
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:roles,id',
        ];
    }
}
