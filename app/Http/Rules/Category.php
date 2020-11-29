<?php

namespace App\Http\Rules;

class Category {

    public function __construct() {
        //
    }

    public static function rules() {
        return [
            'name' => 'required'
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => 'Name is required',
        ];
    }
}
