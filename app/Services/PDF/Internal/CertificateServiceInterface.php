<?php

declare(strict_types=1);

namespace App\Services\PDF\Internal;

use App\Services\PDF\Input\Certificate;

interface CertificateServiceInterface
{
    public function createPDF(Certificate $sertificate);
}
