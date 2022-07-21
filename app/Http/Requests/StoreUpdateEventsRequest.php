<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEventsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'city' => [
                'required',
                'string'
            ],
            'private' => [
                'required',
                'string'
            ],
            'items' => [
                'nullable'
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024'
            ]
        ];
    }
}
