<?php

namespace App\Http\Validators;
use Illuminate\Support\Facades\Validator;

class ValidatePostUpdateData
{
    static function validate($data)
    {
        $validator = Validator::make($data->all(), [
            'number' => 'string|nullable|max:3',
            'img' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'category' => 'nullable|string|max:255',
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


