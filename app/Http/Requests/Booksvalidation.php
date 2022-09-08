<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Booksvalidation extends FormRequest
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
            'name'=>'required',
            'isbn'=>'required',
            'authors'=>'required',
            'country'=>'required',
            'number_of_pages'=>'required',
            'publisher'=>'required',
            'release_date'=>'required',
        ];
    }
    public function message()
    {
        return[
            'name.required'=>'Please ensure you provide the name of the book',
            'isbn.required'=>'Please ensure you provide the isbn of the book',
            'authors.required'=>'Please ensure you provide the authors of the book',
            'country.required'=>'Please ensure you provide the country of the book',
            'number_of_pages.required'=>'Please ensure you provide the number of pages of the book',
            'publisher.required'=>'Please ensure you provide the Publisher of the book',
            'release_date.required'=>'Please ensure you provide the Release Date of the book',
        ];
     }
}
