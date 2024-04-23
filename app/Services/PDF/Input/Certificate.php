<?php

declare(strict_types=1);

namespace App\Services\PDF\Input;

use App\Traits\ReformatDateTrait;

class Certificate
{
    use ReformatDateTrait;

    private int $serialNumber;
    private string $courseName;
    private string $studentName;
    private string $completionDate;

    public function __construct(
        int    $serialNumber,
        string $courseName,
        string $studentName,
        string $completionDate
    )
    {
        $this->serialNumber = $serialNumber;
        $this->courseName = $courseName;
        $this->studentName = $studentName;
        $this->completionDate = $this->reformatDate($completionDate);
    }

    public function getSerialNumber(): int
    {
        return $this->serialNumber;
    }

    public function getCourseName(): string
    {
        return $this->courseName;
    }

    public function getStudentName(): string
    {
        return $this->studentName;
    }

    public function getCompletionDate(): string
    {
        return $this->completionDate;
    }
}
