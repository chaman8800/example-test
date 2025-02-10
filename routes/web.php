<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DetailController;

Route::get('/details', [DetailController::class, 'index'])->name('details.index');
Route::post('/details', [DetailController::class, 'store'])->name('details.store');
Route::get('/details/{id}/edit', [DetailController::class, 'edit'])->name('details.edit');
Route::put('/details/{id}', [DetailController::class, 'update'])->name('details.update');
Route::delete('/details/{id}', [DetailController::class, 'destroy'])->name('details.destroy');
// Route::post('/details/bulk-upload', [DetailController::class, 'bulkUpload'])->name('details.bulk.upload');
// Route::get('/details/bulk-download', [DetailController::class, 'bulkDownload'])->name('details.bulk.download');
Route::post('/details/bulk-upload', [DetailController::class, 'bulkUpload'])->name('details.bulk.upload');

// Bulk download
Route::get('/details/bulk-download', [DetailController::class, 'bulkDownload'])->name('details.bulk.download');
