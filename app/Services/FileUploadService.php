<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FileUploadService
{
    public static function uploadFile(UploadedFile $file): ?string
    {
        if (! $file->isValid()) {
            return null;
        }

        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image')) {

            $folder = 'images';
        } elseif (str_starts_with($mimeType, 'video')) {

            $folder = 'videos';
        } else {

            $folder = 'documents';
        }

        $extension = $file->getClientOriginalExtension();

        $filename = date('d-m-Y') . '-' . Str::random(30) . '.' . $extension;

        $destination = public_path('uploaded/' . $folder);

        if (! file_exists($destination)) {
            mkdir($destination, 0775, true);
        }

        try {
            $file->move($destination, $filename);

            return 'uploaded/' . $folder . '/' . $filename;
        } catch (\Exception $e) {
            Log::error('Fayl yuklashda xatolik: ' . $e->getMessage());
            return $e->getMessage();
        }
    }
}
