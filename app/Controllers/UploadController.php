<?php

namespace App\Controllers;

class UploadController extends BaseController
{

    public function uploadImage()
    {
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            // Pindahkan file ke folder yang diinginkan di server
            $newName = $file->getRandomName();
            $file->move('uploads/images', $newName);

            // Tanggapi ke client dan kembalikan path gambar
            $imagePath = 'uploads/images/' . $newName;

            return $this->response->setJSON(['message' => 'Upload successful', 'imagePath' => $imagePath]);
        } else {
            // Tanggapi ke client jika terjadi kesalahan
            return $this->response->setJSON(['error' => $file->getErrorString()]);
        }
    }
}
