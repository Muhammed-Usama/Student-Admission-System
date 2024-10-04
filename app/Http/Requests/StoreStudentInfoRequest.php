<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'phone' => 'required',
            'address' => 'required',
            'nationalid' => 'required|unique:students,nationalid|min:14|max:14',
            'national_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dateofbirth' => 'required|date|date_format:Y-m-d|after:2004-01-01|before:2006-12-31',
            'gander' => 'required|string',
            'governorate_id' => 'required|exists:governorates,id',
        ];
    }
    public function messages()
    {
        return [
            'dateofbirth.after' => 'The date of birth must be after January 1, 2004.',
            'dateofbirth.before' => 'The date of birth must be before December 31, 2006.',
        ];
    }
}
