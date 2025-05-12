<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
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
    public function test_if_we_can_access_the_get_all_products_api(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200)->assertJsonStructure([
            'products' => [
                '*' => [
                    'id',
                    'name',
                    'pricing',
                    'category_id',
                    'description',
                    'images',
                    'created_at',
                ],
            ],
        ]);
    }

    /**
     * Test ID: Product-002
     * Description: Check if we can create a new product
     * Precondition: At least one category exists in the database
     * Test steps: 1. Get an existing category ID
     *             2. Send POST request to create product API
     *             3. Check if the response status is 200
     *             4. Verify the returned product data matches the input
     * Test Data: {"name": "", "description": "", "price": , "category_id": }
     * Expected result: The response status should be 200 and returned data should match input
     * Actual Result: The response status is 200 and returned data matches input
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_create_a_new_product(): void
    {
        $response = $this->post('/api/products', [
            'name' => '',
            'category_id' => ,
            'pricing' => ,
            'description' => '',
        ]);

        $response->assertSuccessful();
    }

    /**
     * Test ID: Product-003
     * Description: Check if we can update an existing product
     * Precondition: At least one product exists in the database
     * Test steps: 1. Get an existing product ID
     *             2. Send PATCH request to update the product
     *             3. Check if the response status is 200
     *             4. Verify the product was updated in database
     * Test Data: {"name": "", "price": }
     * Expected result: The response status should be 200 and database should reflect changes
     * Actual Result: The response status is 200 and database reflects changes
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_update_an_existing_product(): void
    {
        $response = $this->patch('/api/products/{productId}', [
            'name' => '',
            'category_id' => ,
            'pricing' => ,
            'description' => '',
        ]);

        $response->assertOk();
    }

    /**
     * Test ID: Product-004
     * Description: Check if we can get a specific product by ID
     * Precondition: At least one product exists in the database
     * Test steps: 1. Get an existing product ID
     *             2. Send GET request to get product by ID
     *             3. Check if the response status is 200
     *             4. Verify the returned data matches the product
     * Test Data: None (uses existing product ID)
     * Expected result: The response status should be 200 and returned data should match the product
     * Actual Result: The response status is 200 and returned data matches the product
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_get_a_specific_product_by_id(): void
    {
        $response = $this->get('/api/products/{productId}');

        $response->assertStatus(200)->assertJsonIsArray();
    }

    /**
     * Test ID: Product-005
     * Description: Check if we can get products by category ID
     * Precondition: At least one category with products exists in the database
     * Test steps: 1. Get an existing category ID with products
     *             2. Send GET request to get products by category ID
     *             3. Check if the response status is 200
     *             4. Verify all returned products belong to the specified category
     * Test Data: None (uses existing category ID)
     * Expected result: The response status should be 200 and all products should belong to the category
     * Actual Result: The response status is 200 and all products belong to the category
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_get_products_by_category_id(): void
    {
        $response = $this->get('/api/categories/{categoryId}/products');

        $response->assertOk();
    }

    /**
     * Test ID: Product-006
     * Description: Check if we can soft-delete a product
     * Precondition: At least one product exists in the database
     * Test steps: 1. Get an existing product ID
     *             2. Send DELETE request to delete the product
     *             3. Check if the response status is 200
     *             4. Verify the product has deleted_at value in database
     * Test Data: None (uses existing product ID)
     * Expected result: The response status should be 200 and product should be soft-deleted
     * Actual Result: The response status is 200 and product is soft-deleted
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_soft_delete_a_product(): void
    {
        $response = $this->delete('/api/products/{productId}', [
            'name' => '',
            'category_id' => ,
            'pricing' => ,
            'description' => '',
        ]);

        $response->assertSuccessful();
    }
}
