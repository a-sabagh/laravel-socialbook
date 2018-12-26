<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|max:256',
            'pages' => 'integer|required',
            'isbn' => 'string|unique:books,isbn|required|size:10',
            'price' => 'integer|required',
            'published_at' => 'date|required'
        ];
    }
}
