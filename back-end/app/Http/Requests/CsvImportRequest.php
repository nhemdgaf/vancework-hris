<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'csv_file' => 'required|file|mimes:csv,txt'
        ];
    }
}
