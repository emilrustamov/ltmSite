<?php

namespace App\Http\Controllers;

use App\Services\Sitemap\SitemapBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SitemapController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(Request $request, SitemapBuilder $sitemapBuilder): Response
    {
        $baseUrl = rtrim($request->getSchemeAndHttpHost(), '/');

        if (!$baseUrl || str_contains($baseUrl, 'localhost')) {
            $baseUrl = rtrim((string) config('app.url'), '/');
        }

        return $sitemapBuilder->build($baseUrl)->toResponse($request);
    }
}
