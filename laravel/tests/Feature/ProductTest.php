<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test ID: Product-001
     * Description: Check if we can access the get all products api
     * Precondition: None
     * Test steps: 1. Hit the get all products api
     *             2. Check if the response status is 200
     * Test Data: None
     * Expected result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */

    //
    public function check_if_we_can_access_the_get_all_products_api(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }
}
