<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class EditTasksFormRequest extends BaseFormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =
		[
            'description' => 'required|string',
            'ready' => 'boolean',
        ];

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['description', 'ready']);

        return $data;
    }
}