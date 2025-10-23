<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class JobPositionController extends Controller
{

    /**
     * Display all job positions
     */
    public function all($lang)
    {
        App::setLocale($lang);
        
        $jobPositions = JobPosition::with('technicalSkills')
            ->published()
            ->ordered()
            ->paginate(12);

        return view('job-positions.all', [
            'lang' => $lang,
            'jobPositions' => $jobPositions
        ]);
    }

    /**
     * Display the specified job position
     */
    public function show($lang, JobPosition $jobPosition)
    {
        App::setLocale($lang);
        
        // Проверяем, что вакансия активна
        if (!$jobPosition->status || !$jobPosition->is_active) {
            abort(404);
        }

        $jobPosition->load('technicalSkills');

        return view('job-positions.show', [
            'lang' => $lang,
            'jobPosition' => $jobPosition
        ]);
    }
}
