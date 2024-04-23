<?php

declare(strict_types=1);

namespace App\Services\PDF\Internal;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\LaravelPdf\Facades\Pdf;

use Illuminate\Support\Facades\{Storage, File};

use App\Services\PDF\Input\Certificate;
use App\Services\PDF\Repositories\CertificateRepositoryInterface;

class CertificateService implements CertificateServiceInterface
{
    public function __construct(private readonly CertificateRepositoryInterface $repository)
    {
    }

    public function createPDF(Certificate $certificate)
    {
        $newDocument = $this->repository->create($certificate);

        $qrCode = QrCode::size(200)->generate(route('certificate.show', ['certificate' => $newDocument->id]));

        $dataForPDF = [
            'id' => $newDocument->id,
            'serial_number' => $newDocument->serial_number,
            'name' => $newDocument->name,
            'student_name' => $newDocument->student_name,
            'competition_date' => $newDocument->competition_date,
            'qr_code' => $qrCode
        ];

        $certificateHTML = view('pdf.certificate.index')->with(['certificate' => $dataForPDF])->render();

        $filePath = storage_path("app/pdf/certificates/{$newDocument->id}.pdf");
        $certificatesStorePath = "app/pdf/certificates";

        if (!Storage::exists($certificatesStorePath)) {
            File::makeDirectory(storage_path($certificatesStorePath), 0777, true, true);
        }

        Pdf::html($certificateHTML)->save($filePath);

        return "pdf/certificates/{$newDocument->id}.pdf";
    }
}
