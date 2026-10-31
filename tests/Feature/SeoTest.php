<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_company_profile_pdf_opens_inline(): void
    {
        $response = $this->get('/company-profile');

        $response->assertOk();
        $this->assertSame('application/pdf', $response->headers->get('Content-Type'));
        $this->assertStringStartsWith('inline;', $response->headers->get('Content-Disposition'));
    }

    public function test_sitemap_lists_all_pages(): void
    {
        $response = $this->get('/sitemap.xml')->assertOk();

        foreach (['home', 'about', 'services', 'clients', 'contact', 'company-profile'] as $route) {
            $response->assertSee('<loc>'.route($route).'</loc>', false);
        }
    }

    public function test_robots_allows_indexing_and_points_to_sitemap(): void
    {
        $this->get('/robots.txt')->assertOk()->assertSee('Allow: /')->assertSee('Sitemap: '.route('sitemap'));
    }

    public function test_home_has_structured_data_and_profile_button(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        preg_match('#<script type="application/ld\+json">(.+?)</script>#s', $html, $match);
        $schema = json_decode($match[1] ?? '', true);

        $this->assertIsArray($schema, 'JSON-LD must be valid JSON');
        $types = array_column($schema['@graph'], '@type');
        $this->assertContains('Organization', $types);
        $this->assertContains('WebSite', $types);
        $this->assertContains('FAQPage', $types);
        $this->assertStringContainsString(route('company-profile'), $html);
    }

    public function test_unknown_page_returns_branded_404(): void
    {
        $this->get('/does-not-exist')->assertNotFound()->assertSee('Page Not Found');
    }
}
