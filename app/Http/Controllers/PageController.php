<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Services\Portfolio\BitrixProjectsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function bitrix(string $lang, BitrixProjectsService $bitrixProjectsService): View
    {
        App::setLocale($lang);
        $bitrixProjects = $bitrixProjectsService->getProjects();

        return view('bitrix', compact('lang', 'bitrixProjects'));
    }

    /**
     * @return View
     */
    public function services(string $lang): View
    {
        return $this->renderStatic($lang, 'services');
    }

    /**
     * @return View
     */
    public function aboutUs(string $lang): View
    {
        return $this->renderStatic($lang, 'about_us');
    }

    /**
     * @return View
     */
    public function teltonika(string $lang): View
    {
        return $this->renderStatic($lang, 'teltonika');
    }

    /**
     * @return View
     */
    public function contacts(string $lang): View
    {
        return $this->renderStatic($lang, 'contacts');
    }

    /**
     * @return RedirectResponse
     */
    public function redirectPortfolio(string $lang, int $id): RedirectResponse
    {
        $portfolio = Portfolio::query()->findOrFail($id);

        return redirect()->route('lang.portfolio.show', [
            'lang' => $lang,
            'portfolio' => $portfolio->slug,
        ], 301);
    }

    /**
     * @return View
     */
    private function renderStatic(string $lang, string $viewName): View
    {
        App::setLocale($lang);
        $leftMenu = true;
        $currentPage = '';

        return view($viewName, compact('leftMenu', 'currentPage', 'lang'));
    }
}
