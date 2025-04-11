<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ConvertStaticImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'images:convert-to-webp {source=public/assets/images} {destination=public/webp}';

    /**
     * The console command description.
     */
    protected $description = 'Конвертирует статичные изображения в формат WebP';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $source = $this->argument('source');
        $destination = $this->argument('destination');

        if (!File::exists($source)) {
            $this->error("Папка {$source} не найдена.");
            return;
        }

        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $files = File::files($source);

        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());
            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                continue;
            }

            $this->info("Обработка файла: " . $file->getFilename());

            try {
                $img = Image::make($file->getPathname());
                // Генерируем имя файла с расширением webp
                $newFileName = pathinfo($file->getFilename(), PATHINFO_FILENAME) . '.webp';

                // Сохраняем изображение в папке назначения с качеством 90
                $img->encode('webp', 90)
                    ->save($destination . '/' . $newFileName);

                $this->info("Сконвертировано: " . $newFileName);
            } catch (\Exception $e) {
                $this->error("Ошибка при обработке файла " . $file->getFilename() . ": " . $e->getMessage());
            }
        }

        $this->info("Конвертация изображений завершена.");
    }
}
