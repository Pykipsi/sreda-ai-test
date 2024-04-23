<?php

namespace App\Traits;

use Carbon\Carbon;

trait ReformatDateTrait
{
    private string $format = 'Y-m-d H:i:s';

    protected function reformatDate(string $date): string
    {
        return Carbon::parse($date)->format($this->format);
    }
}
