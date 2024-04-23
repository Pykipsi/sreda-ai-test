<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Services\PDF\Internal\CertificateServiceInterface;

use App\Http\Requests\PDF\CertificatePDFRequest;
use App\Models\Certificate as CertificateModel;

class CertificateController extends Controller
{
    public function __construct(private readonly CertificateServiceInterface $certificateService)
    {
    }

    public function show(CertificateModel $certificate)
    {
        $filePath = "pdf/certificates/{$certificate->id}.pdf";

        if (Storage::exists($filePath)) {
            $fileContent = Storage::get($filePath);

            return response($fileContent, 200)->header('Content-Type', 'application/pdf');
        } else {
            abort(404, 'File not found.');
        }

        //return view('pdf.certificate.show');
    }

    public function index()
    {
        return view('pdf.certificate.store');
    }

    public function store(CertificatePDFRequest $request)
    {
        $filePath = $this->certificateService->createPDF($request->createDTO());

        return Storage::download($filePath);
    }
}
