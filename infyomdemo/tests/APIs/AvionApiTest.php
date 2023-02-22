<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Avion;

class AvionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_avion()
    {
        $avion = Avion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/avions', $avion
        );

        $this->assertApiResponse($avion);
    }

    /**
     * @test
     */
    public function test_read_avion()
    {
        $avion = Avion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/avions/'.$avion->id
        );

        $this->assertApiResponse($avion->toArray());
    }

    /**
     * @test
     */
    public function test_update_avion()
    {
        $avion = Avion::factory()->create();
        $editedAvion = Avion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/avions/'.$avion->id,
            $editedAvion
        );

        $this->assertApiResponse($editedAvion);
    }

    /**
     * @test
     */
    public function test_delete_avion()
    {
        $avion = Avion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/avions/'.$avion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/avions/'.$avion->id
        );

        $this->response->assertStatus(404);
    }
}
