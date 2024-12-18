<?php

namespace App\Http\Requests\Subscriber;

use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriberRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'min:5|required|string|max:255',
            'email' => 'required|string|email|max:255'
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new DomainException($validator->messages()->all(), 422);
    }
}