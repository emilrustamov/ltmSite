<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ANMail;
  
class Contact extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'phone', 'message', 'subject'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
            try {
                $adminEmail = "hr@ltm.studio";
                Mail::to($adminEmail)->send(new ANMail($item));
            } catch (\Exception $e) {
                // Логируем ошибку, но не прерываем сохранение
                \Log::error('Ошибка отправки почты: ' . $e->getMessage());
            }
        });
    }
}