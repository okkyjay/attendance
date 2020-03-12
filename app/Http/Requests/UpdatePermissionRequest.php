<?php

namespace App\Http\Requests;

use App\Permission;
use Gate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'title' => [
                'required',
            ],
        ];
    }
}
