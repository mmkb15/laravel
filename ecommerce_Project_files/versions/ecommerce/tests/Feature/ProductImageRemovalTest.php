<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('offers removal for product images stored in the public assets directory', function () {
    $user = User::factory()->create(['role' => 'admin']);
    $category = Category::create([
        'name' => 'Watch Category',
        'slug' => 'watch-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Test Watch',
        'slug' => 'test-watch',
        'image' => 'assets/images/products/1.png',
        'category_id' => $category->id,
        'sku' => 'TEST-WATCH-001',
        'price' => 100,
        'stock' => 1,
        'status' => 'active',
    ]);
    $image = ProductImage::create([
        'product_id' => $product->id,
        'path' => 'assets/images/products/1.png',
        'is_primary' => true,
    ]);

    $this->actingAs($user)
        ->get(route('products.edit', $product))
        ->assertOk()
        ->assertSee('name="remove_images[]"', false)
        ->assertSee('value="' . $image->id . '"', false);
});

it('removes an assets-backed product image from the gallery', function () {
    $user = User::factory()->create(['role' => 'admin']);
    $category = Category::create([
        'name' => 'Removal Category',
        'slug' => 'removal-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Removable Watch',
        'slug' => 'removable-watch',
        'image' => 'assets/images/products/1.png',
        'category_id' => $category->id,
        'sku' => 'REMOVABLE-WATCH-001',
        'price' => 100,
        'stock' => 1,
        'status' => 'active',
    ]);
    $image = ProductImage::create([
        'product_id' => $product->id,
        'path' => 'assets/images/products/1.png',
        'is_primary' => true,
    ]);

    $this->actingAs($user)
        ->put(route('products.update', $product), [
            'name' => $product->name,
            'category_id' => $category->id,
            'sku' => $product->sku,
            'price' => $product->price,
            'stock' => $product->stock,
            'status' => $product->status,
            'remove_images' => [$image->id],
        ])
        ->assertRedirect(route('products.index'));

    $this->assertDatabaseMissing('product_images', ['id' => $image->id]);
    expect($product->fresh()->image)->toBeNull();
});
