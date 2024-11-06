<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wherehouse;
use App\Models\product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\productController
 */
final class productControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $products = product::factory()->count(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertOk();
        $response->assertViewIs('product.index');
        $response->assertViewHas('products');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('products.create'));

        $response->assertOk();
        $response->assertViewIs('product.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\productController::class,
            'store',
            \App\Http\Requests\productStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $Wherehouse = Wherehouse::factory()->create();
        $user = User::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $register = Carbon::parse($this->faker->date());

        $response = $this->post(route('products.store'), [
            'Wherehouse_id' => $Wherehouse->id,
            'user_id' => $user->id,
            'status' => $status,
            'register' => $register->toDateString(),
        ]);

        $products = Product::query()
            ->where('Wherehouse_id', $Wherehouse->id)
            ->where('user_id', $user->id)
            ->where('status', $status)
            ->where('register', $register)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('product.id', $product->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $product = product::factory()->create();

        $response = $this->get(route('products.show', $product));

        $response->assertOk();
        $response->assertViewIs('product.show');
        $response->assertViewHas('product');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $product = product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response->assertOk();
        $response->assertViewIs('product.edit');
        $response->assertViewHas('product');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\productController::class,
            'update',
            \App\Http\Requests\productUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $product = product::factory()->create();
        $Wherehouse = Wherehouse::factory()->create();
        $user = User::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $register = Carbon::parse($this->faker->date());

        $response = $this->put(route('products.update', $product), [
            'Wherehouse_id' => $Wherehouse->id,
            'user_id' => $user->id,
            'status' => $status,
            'register' => $register->toDateString(),
        ]);

        $product->refresh();

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('product.id', $product->id);

        $this->assertEquals($Wherehouse->id, $product->Wherehouse_id);
        $this->assertEquals($user->id, $product->user_id);
        $this->assertEquals($status, $product->status);
        $this->assertEquals($register, $product->register);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $product = product::factory()->create();
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertModelMissing($product);
    }
}
