<?php

namespace App\Http\Validators;
use Illuminate\Support\Facades\Validator;

class ValidatePostData
{
    static function validate($data)
    {
        $validator = Validator::make($data->all(), [
            'number' => 'string|required|unique:posts|max:3',
            'img' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'category' => 'required|string|max:255',
            'idUrl' => 'nullable|string|max:255',
            'link1' => 'nullable|url|max:255',
            'link2' => 'nullable|url|max:255',
            'link3' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        return $validator->validated();
    }
}


