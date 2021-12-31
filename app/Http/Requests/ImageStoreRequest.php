<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
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
            'promoted_at' => 'required|date',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'description' => 'required|string',
            'alt_description' => 'required|string',
            // 'urls' => 'required|json',
            // 'links' => 'required|json',
            'category_id' => 'required|integer',
            'likes' => 'required|integer',
        ];
    }
}
