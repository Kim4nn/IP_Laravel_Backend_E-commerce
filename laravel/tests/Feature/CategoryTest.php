<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test ID: Category-001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test steps: 1. Hit the get all cateogories api
     *             2. Check if the response status is 200
     * Test Data: None
     * Expected result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */

    public function check_if_we_can_access_the_get_all_categories_api(): void
    {
        $response = $this->get('/api/categories');

        // Assert that the response has a successful (>=200 and <300) HTTP status code
        $response->assertSuccessful();
    }
}
