<?php

namespace App\Http\Validators;
use Illuminate\Support\Facades\Validator;

class ValidateUserPostData
{
    static function validate($data)
    {
        $validator = Validator::make($data->all(), [
            'name' => 'required|string|max:255',
            'email' => 'email|required|unique:users|max:255',
            'password' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        return $validator->validated();
    }
}


