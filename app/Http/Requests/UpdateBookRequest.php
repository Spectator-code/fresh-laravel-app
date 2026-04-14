<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer|min:0|max:'.date('Y'),
            'isbn' => 'required',
            'pages' => 'required|integer|min:1',
            'language' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric|min:1',
            'is_available' => 'boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

