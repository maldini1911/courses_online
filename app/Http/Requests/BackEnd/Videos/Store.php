<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['required', 'string', 'max:191'],
            'meta_desc' => ['required', 'string', 'max:191'],
            'desc' => ['required', 'string', 'max:191'],
            'published' => ['required'],
            'cat_id' => ['required', 'integer'],
            'image' => ['required', 'image'],
            'youtube' => ['required', 'string', 'min:10'],
        ];
    }
}
