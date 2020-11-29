<?php

namespace App\Http\Rules;

class Product {

    public function __construct() {
        //
    }

    public static function rules() {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'url_imgs' => 'json'
        ];
    }

    public static function messages()
    {
        return [
            'category_id.required' => 'Categories Id is required',
            'name.required' => 'Email is required',
            'price.required' => 'Password is required',
            'url_imgs.json' => 'Please json'
        ];
    }
}
