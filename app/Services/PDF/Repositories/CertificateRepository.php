<?php

declare(strict_types=1);

namespace App\Services\PDF\Repositories;

use App\Models\Certificate as CertificateModel;
use App\Services\PDF\Input\Certificate;

class CertificateRepository implements CertificateRepositoryInterface
{
    public function __construct(private readonly CertificateModel $certificates)
    {
    }

    public function create(Certificate $certificate): CertificateModel
    {
        $newCertificate = new CertificateModel();

        $newCertificate->serial_number = $certificate->getSerialNumber();
        $newCertificate->name = $certificate->getCourseName();
        $newCertificate->student_name = $certificate->getStudentName();
        $newCertificate->competition_date = $certificate->getCompletionDate();
        $newCertificate->save();

        return $newCertificate;
    }

    public function delete(int $id): void
    {
        $this->certificates->where('id', $id)->delete();
    }
}
