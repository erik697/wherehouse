<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Wherehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WherehouseController
 */
final class WherehouseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $wherehouses = Wherehouse::factory()->count(3)->create();

        $response = $this->get(route('wherehouses.index'));

        $response->assertOk();
        $response->assertViewIs('wherehouse.index');
        $response->assertViewHas('wherehouses');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('wherehouses.create'));

        $response->assertOk();
        $response->assertViewIs('wherehouse.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WherehouseController::class,
            'store',
            \App\Http\Requests\WherehouseStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $code = $this->faker->word();

        $response = $this->post(route('wherehouses.store'), [
            'name' => $name,
            'code' => $code,
        ]);

        $wherehouses = Wherehouse::query()
            ->where('name', $name)
            ->where('code', $code)
            ->get();
        $this->assertCount(1, $wherehouses);
        $wherehouse = $wherehouses->first();

        $response->assertRedirect(route('wherehouses.index'));
        $response->assertSessionHas('wherehouse.id', $wherehouse->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $wherehouse = Wherehouse::factory()->create();

        $response = $this->get(route('wherehouses.show', $wherehouse));

        $response->assertOk();
        $response->assertViewIs('wherehouse.show');
        $response->assertViewHas('wherehouse');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $wherehouse = Wherehouse::factory()->create();

        $response = $this->get(route('wherehouses.edit', $wherehouse));

        $response->assertOk();
        $response->assertViewIs('wherehouse.edit');
        $response->assertViewHas('wherehouse');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WherehouseController::class,
            'update',
            \App\Http\Requests\WherehouseUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $wherehouse = Wherehouse::factory()->create();
        $name = $this->faker->name();
        $code = $this->faker->word();

        $response = $this->put(route('wherehouses.update', $wherehouse), [
            'name' => $name,
            'code' => $code,
        ]);

        $wherehouse->refresh();

        $response->assertRedirect(route('wherehouses.index'));
        $response->assertSessionHas('wherehouse.id', $wherehouse->id);

        $this->assertEquals($name, $wherehouse->name);
        $this->assertEquals($code, $wherehouse->code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $wherehouse = Wherehouse::factory()->create();

        $response = $this->delete(route('wherehouses.destroy', $wherehouse));

        $response->assertRedirect(route('wherehouses.index'));

        $this->assertModelMissing($wherehouse);
    }
}
