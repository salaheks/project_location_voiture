<?php

namespace App\Services;

use Illuminate\Http\Request;

class SaveImageService
{
    /**
     * Uploads an image to a specified directory.
     *
     * @param Request $request The incoming request object.
     * @param string $inputName The name attribute of the input file field.
     * @param string $baseDir The base directory where the image should be stored.
     * @param string $subDir An optional sub-directory to further organize images.
     * @return string|null The stored image path or null if no image was uploaded.
     */
    public function uploadImage($request, $inputName, $company, $baseDir, $subDir = '')
    {
        $path = null;

        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $filename = time() . '_' . $file->getClientOriginalName();

            // Sanitize the sub-directory name
            $safeSubDir = $this->sanitizeFileName($subDir);

            // Construct the storage path dynamically based on the base directory and optional sub-directory
            $storagePath = 'images/' . $company . '/' . $baseDir . ($safeSubDir ? '/' . $safeSubDir : '');

            // Store the file using the 'public' disk. The 'public' disk prepends 'storage/app/public/'
            $path = $file->storeAs($storagePath, $filename, 'public');
        }

        // Return the path relative to the 'public' directory
        return $path ? str_replace('public/', '', $path) : null;
    }

    /**
     * Sanitizes a file name by removing disallowed characters.
     *
     * @param string $name The file name to sanitize.
     * @return string The sanitized file name.
     */
    protected function sanitizeFileName($name)
    {
        return preg_replace('/[^A-Za-z0-9-_ ]/', '', $name);
    }
}
