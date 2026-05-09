<?php
  
namespace App\Models;
  
use App\Mail\ANMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
  
class Contact extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'phone', 'message', 'subject'];

    /**
     * Register model event handlers.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::created(function ($item) {
            dispatch(function () use ($item): void {
                if (! config('mail.notifications_enabled')) {
                    return;
                }

                $adminEmail = config('mail.from.address');
                if (! $adminEmail) {
                    return;
                }

                try {
                    Mail::mailer('failover')->to($adminEmail)->send(new ANMail($item));
                } catch (\Throwable $exception) {
                    Log::error('Ошибка отправки почты: '.$exception->getMessage());
                }
            })->afterResponse();
        });
    }
}