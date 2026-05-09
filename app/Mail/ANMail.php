<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ANMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build mail message.
     */
    public function build()
    {
        $mail = $this->subject('Заявка')->view('mailTemplate');

        if ($this->data->cv_file) {
            $cvFilePath = $this->data->cv_file;
            $cvFilePath = preg_replace('/^(storage\/|public\/|private\/)/', '', $cvFilePath);

            $privateStorage = Storage::disk('private');
            $publicStorage = Storage::disk('public');
            $storage = null;

            if ($privateStorage->exists($cvFilePath)) {
                $storage = $privateStorage;
            } elseif ($publicStorage->exists($cvFilePath)) {
                $storage = $publicStorage;
            }

            if ($storage) {
                $filePath = $storage->path($cvFilePath);
                $originalName = basename($cvFilePath);
                $displayName = preg_replace('/^\d+_/', '', $originalName);

                $mimeType = $storage->mimeType($cvFilePath);
                if (!$mimeType) {
                    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                    $mimeTypes = [
                        'pdf' => 'application/pdf',
                        'doc' => 'application/msword',
                        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ];
                    $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
                }

                if (file_exists($filePath)) {
                    $mail->attach($filePath, [
                        'as' => $displayName,
                        'mime' => $mimeType,
                    ]);
                    
                    \Log::info('CV файл прикреплен к email', [
                        'file_path' => $filePath,
                        'display_name' => $displayName,
                        'mime_type' => $mimeType,
                    ]);
                } else {
                    \Log::warning('CV файл не найден по пути', ['file_path' => $filePath]);
                }
            } else {
                \Log::warning('CV файл не существует в storage', ['cv_file' => $cvFilePath, 'original_path' => $this->data->cv_file]);
            }
        }

        return $mail;
    }
}
