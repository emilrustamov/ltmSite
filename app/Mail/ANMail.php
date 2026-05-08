<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ANMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function build()
    { 
        $mail = $this->subject('Заявка')->view('mailTemplate');
        
        // Прикрепляем файл CV, если он есть
        if ($this->data->cv_file) {
            $storage = Storage::disk('public');
            
            // Убеждаемся, что путь правильный (убираем возможные префиксы storage/ или public/)
            $cvFilePath = $this->data->cv_file;
            $cvFilePath = preg_replace('/^(storage\/|public\/)/', '', $cvFilePath);
            
            if ($storage->exists($cvFilePath)) {
                // Получаем полный путь к файлу
                $filePath = storage_path('app/public/' . $cvFilePath);
                $originalName = basename($cvFilePath);
                
                // Убираем временную метку из имени файла для более читаемого имени
                $displayName = preg_replace('/^\d+_/', '', $originalName);
                
                // Определяем MIME тип
                $mimeType = $storage->mimeType($cvFilePath);
                if (!$mimeType) {
                    // Определяем по расширению, если MIME не определен
                    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                    $mimeTypes = [
                        'pdf' => 'application/pdf',
                        'doc' => 'application/msword',
                        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ];
                    $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
                }
                
                // Проверяем, что файл существует перед прикреплением
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
        } else {
            \Log::info('CV файл не указан в заявке');
        }
        
        return $mail;
    }

}

    /**

     * Build the message.

     *

     * @return $this

     */

  
 

