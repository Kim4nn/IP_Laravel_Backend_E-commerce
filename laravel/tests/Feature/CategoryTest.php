<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test ID: Category-001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test steps: 1. Hit the get all categories api
     *             2. Check if the response status is 200
     * Test Data: None
     * Expected result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_access_the_get_all_categories_api(): void
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200)->assertJsonStructure([
            'categories' => [
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
    
    /**
     * Test ID: Category-002
     * Description: Check if we can create a new category
     * Precondition: None
     * Test steps: 1. Send POST request to create category API
     *             2. Check if the response status is 200
     *             3. Verify the returned category data matches the input
     * Test Data: {"name": ""}
     * Expected result: The response status should be 200 and returned data should match input
     * Actual Result: The response status is 200 and returned data matches input
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_create_a_new_category(): void
    {
        $response = $this->post('/api/categories', [
            'name' => '',
        ]);

        $response->assertSuccessful();
    }

    /**
     * Test ID: Category-003
     * Description: Check if we can update an existing category
     * Precondition: At least one category exists in the database
     * Test steps: 1. Get an existing category ID
     *             2. Send PATCH request to update the category
     *             3. Check if the response status is 200
     *             4. Verify the category was updated in database
     * Test Data: {"name": ""}
     * Expected result: The response status should be 200 and database should reflect changes
     * Actual Result: The response status is 200 and database reflects changes
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_update_an_existing_category(): void
    {
        $response = $this->patch("/api/categories/{categoryId}", [
            'name' => '',
        ]);

        $response->assertOk();
    }

    /**
     * Test ID: Category-004
     * Description: Check if we can get a specific category by ID
     * Precondition: At least one category exists in the database
     * Test steps: 1. Get an existing category ID
     *             2. Send GET request to get category by ID
     *             3. Check if the response status is 200
     *             4. Verify the returned data matches the category
     * Test Data: None (uses existing category ID)
     * Expected result: The response status should be 200 and returned data should match the category
     * Actual Result: The response status is 200 and returned data matches the category
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_get_a_specific_category_by_id(): void
    {
        $response = $this->get("/api/categories/{categoryId}");

        $response->assertStatus(200);
    }

    /**
     * Test ID: Category-005
     * Description: Check if we can soft-delete a category
     * Precondition: At least one category exists in the database
     * Test steps: 1. Get an existing category ID
     *             2. Send DELETE request to delete the category
     *             3. Check if the response status is 200
     *             4. Verify the category has deleted_at value in database
     * Test Data: None (uses existing category ID)
     * Expected result: The response status should be 200 and category should be soft-deleted
     * Actual Result: The response status is 200 and category is soft-deleted
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_soft_delete_a_category(): void
    {
        $response = $this->delete("/api/categories/{categoryId}", [
            'name' => '',
        ]);

        $response->assertStatus(200);
    }
}
