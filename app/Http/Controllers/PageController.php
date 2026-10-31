<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * All static pages. Content comes from config/content.php inside the views,
 * the controller only picks the view and the page's SEO meta.
 */
class PageController extends Controller
{
    /** Pages listed in the navigation and the sitemap. */
    public const PAGES = ['home', 'about', 'services', 'clients', 'contact'];

    public function home(): View
    {
        return $this->page('home');
    }

    public function about(): View
    {
        return $this->page('about');
    }

    public function services(): View
    {
        return $this->page('services');
    }

    public function clients(): View
    {
        return $this->page('clients');
    }

    public function contact(): View
    {
        return $this->page('contact');
    }

    /**
     * Company Profile PDF, opened inline in the browser's PDF viewer (not downloaded).
     * The file lives in storage/, outside the public web root.
     */
    public function companyProfile(): BinaryFileResponse
    {
        $profile = config('content.company_profile');
        $path = storage_path($profile['path']);

        abort_unless(is_file($path), 404);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$profile['filename'].'"',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function sitemap(): Response
    {
        $lastModified = date('Y-m-d', filemtime(config_path('content.php')));

        return response()
            ->view('sitemap', ['pages' => self::PAGES, 'lastModified' => $lastModified])
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    public function robots(): Response
    {
        $lines = ['User-agent: *', 'Allow: /', '', 'Sitemap: '.route('sitemap')];

        return response(implode("\n", $lines)."\n")->header('Content-Type', 'text/plain; charset=utf-8');
    }

    private function page(string $name): View
    {
        return view("pages.{$name}", [
            'page' => $name,
            'seo' => config("content.seo.{$name}"),
        ]);
    }
}
