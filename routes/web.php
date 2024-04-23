<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('certificates/{certificate}', [CertificateController::class, 'show'])->name('certificate.show');

Route::group(['prefix' => 'pdf'], function () {
    Route::get('create-certificate', [CertificateController::class, 'index']);
    Route::post('create-certificate', [CertificateController::class, 'store'])->name('pdf.certificate.create');
});
