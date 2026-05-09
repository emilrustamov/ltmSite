<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Traits\LogsUserActivity;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    use LogsUserActivity;

    /**
     * @var string[]
     */
    private const LIST_RELATIONS = ['city', 'source', 'workFormat', 'education'];

    /**
     * @var string[]
     */
    private const DETAIL_RELATIONS = [
        'city',
        'source',
        'workFormat',
        'education',
        'jobPositions',
        'technicalSkills',
        'languages',
        'workExperiences',
        'educationalInstitutions',
    ];

    public function index()
    {
        $applications = Application::with(self::LIST_RELATIONS)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }

    public function show(Application $application)
    {
        $application->load(self::DETAIL_RELATIONS);

        return view('admin.applications.show', compact('application'));
    }




    /**
     * Delete application.
     */
    public function destroy(Application $application)
    {
        $this->logDelete('Application', $application->id, [
            'name' => $application->name,
            'surname' => $application->surname,
            'email' => $application->email,
        ]);

        $cvLocation = $this->resolveCvLocation($application->cv_file);
        if ($cvLocation) {
            Storage::disk($cvLocation['disk'])->delete($cvLocation['path']);
        }

        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно удалена!');
    }

    /**
     * Download CV file.
     */
    public function downloadCv(Application $application)
    {
        $cvLocation = $this->resolveCvLocation($application->cv_file);
        if ($cvLocation) {
            return response()->download(Storage::disk($cvLocation['disk'])->path($cvLocation['path']));
        }

        abort(404, 'CV файл не найден');
    }

    /**
     * @return array{disk: string, path: string}|null
     */
    private function resolveCvLocation(?string $path): ?array
    {
        if (!$path) {
            return null;
        }

        foreach (['private', 'public'] as $disk) {
            if (Storage::disk($disk)->exists($path)) {
                return [
                    'disk' => $disk,
                    'path' => $path,
                ];
            }
        }

        return null;
    }
}