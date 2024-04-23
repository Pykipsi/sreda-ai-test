<?php

declare(strict_types=1);

namespace App\Http\Requests\PDF;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\PDF\Input\Certificate;

class CertificatePDFRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'serial_number' => ['required', 'int', 'max:12'],
            'course_name' => ['required', 'string', 'max:65'],
            'student_name' => ['required', 'string', 'max:80',],
            'completion_date' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }

    public function createDTO(): Certificate
    {
        return new Certificate(
            (int)$this->get('serial_number'),
            (string)$this->get('course_name'),
            (string)$this->get('student_name'),
            (string)$this->get('completion_date')
        );
    }
}
