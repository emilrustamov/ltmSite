<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsUserActivity;

class ApplicationController extends Controller
{
    use LogsUserActivity;
    
    // Список всех заявок (админ)
    public function index()
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        $applications = Application::with(['city', 'source', 'workFormat', 'education'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }

    // Просмотр заявки
    public function show(Application $application)
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        $application->load([
            'city', 
            'source', 
            'workFormat', 
            'education', 
            'jobPositions', 
            'technicalSkills', 
            'languages', 
            'workExperiences', 
            'educationalInstitutions'
        ]);

        return view('admin.applications.show', compact('application'));
    }




    // Удаление заявки
    public function destroy(Application $application)
    {
        // Проверка разрешения на удаление заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления заявок');
        }

        // Логируем удаление
        $this->logDelete('Application', $application->id, [
            'name' => $application->name,
            'surname' => $application->surname,
            'email' => $application->email,
        ]);

        // Удаляем CV файл перед удалением записи
        if ($application->cv_file && file_exists(public_path($application->cv_file))) {
            unlink(public_path($application->cv_file));
        }
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно удалена!');
    }

    // Скачивание CV файла
    public function downloadCv(Application $application)
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        if (!$application->cv_file || !file_exists(public_path($application->cv_file))) {
            abort(404, 'CV файл не найден');
        }

        return response()->download(public_path($application->cv_file));
    }
}