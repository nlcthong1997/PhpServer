<?php

namespace App\Http\Rules;

class Register {

    public function __construct() {
        //
    }

    public static function rules() {
        return [
            'nick_name' => 'max:64',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public static function messages()
    {
        return [
            'nick_name.max' => 'The maximum length of nick_name is 64 characters',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}
