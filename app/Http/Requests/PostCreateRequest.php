<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required', 
            'game_id'=> 'required', 
            'type_id'=> 'required', 
            'content'=> 'required', 
            'contact'=> 'required', 
            'contact'=> 'required', 
            'condition_id'=> 'required', 
        ];
    }
}
