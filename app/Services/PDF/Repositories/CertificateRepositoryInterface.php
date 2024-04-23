<?php

declare(strict_types=1);

namespace App\Services\PDF\Repositories;

use App\Models\Certificate as CertificateModel;
use App\Services\PDF\Input\Certificate;

interface CertificateRepositoryInterface
{
    public function create(Certificate $certificate): CertificateModel;

    public function delete(int $id): void;
}
