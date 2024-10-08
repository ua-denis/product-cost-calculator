<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\MarkupsDiscount;
use App\Models\ProductCategory;
use App\Models\SalesLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CostEstimateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');

        $this->seed();
    }

    public function test_cost_estimate_calculation(): void
    {
        $this->mock(ProductCategory::class, function ($mock) {
            $mock->shouldReceive('where')->andReturnSelf();
            $mock->shouldReceive('firstOrFail')->andReturn(new ProductCategory(['name' => 'Electronics']));
        });

        $this->mock(SalesLocation::class, function ($mock) {
            $mock->shouldReceive('where')->andReturnSelf();
            $mock->shouldReceive('firstOrFail')->andReturn(new SalesLocation(['name' => 'Kyiv']));
        });

        $this->mock(MarkupsDiscount::class, function ($mock) {
            $mock->shouldReceive('all')->andReturn(collect([
                new MarkupsDiscount(['description' => 'Test Discount', 'percentage' => 10]),
            ]));
        });

        $payload = [
            'base_price' => 100.00,
            'category' => 'Electronics',
            'location' => 'Kyiv',
            'quantity' => 12,
        ];

        $response = $this->postJson('/api/calculate', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'final_cost',
                'details' => [
                    '*' => [
                        'description',
                        'percentage',
                        'amount',
                    ],
                ],
            ]);
    }
}
