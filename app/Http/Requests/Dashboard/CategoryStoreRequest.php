<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name_ar' => 'required|string|min:3|max:255|unique:categories,name_ar',
            'name_en' => 'required|string|min:3|max:255|unique:categories,name_en',
            'sort_order' => 'nullable|integer|gte:1',
            'parent_id' => 'nullable|integer|exists:categories,id',
            'desc_ar' => 'nullable|string|min:3|max:255',
            'desc_en' => 'nullable|string|min:3|max:255',
            'icon' => $this->parent_id ? 'nullable|mimes:svg|max:256' : 'nullable|mimes:svg|max:256',
            'image' => $this->parent_id ? 'nullable' : 'required',
            // 'meta_title' => 'nullable|string|min:3|max:255',
            // 'meta_description' => 'nullable|string|min:3|max:255',
            // 'parent_id' => 'nullable|integer|gte:1',
        ];
    }
}
