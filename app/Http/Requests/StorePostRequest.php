<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            //Validation
            'title' => ['required', 'min:3', 'unique:posts'],
            'description' => ['required', 'min:5'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Your post must have a title',
            'title.min' => 'The title has to be longer than 3 letters',
        ];
    }
}
