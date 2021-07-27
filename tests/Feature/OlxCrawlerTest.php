<?php

namespace Tests\Feature;

use Tests\TestCase;

class OlxCrawlerTest extends TestCase
{
    /**
     * Checks if the home page returns HTTP status code 200
     *
     * @return void
     */
    public function test_assert_home_page_http_status()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
