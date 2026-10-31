<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public static function pages(): array
    {
        return [
            'home' => ['/', 'Integrated Logistics from Indonesia'],
            'about' => ['/about', 'Vision'],
            'services' => ['/services', 'Customs Management Services'],
            'clients' => ['/clients', 'ISO 9001:2015'],
            'contact' => ['/contact', 'Our Offices'],
        ];
    }

    /** @dataProvider pages */
    public function test_page_renders_with_seo_meta(string $uri, string $expected): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($expected)
            ->assertSee('<meta property="og:title"', false)
            ->assertSee('<meta name="description"', false);
    }
}
