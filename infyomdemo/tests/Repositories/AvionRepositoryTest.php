<?php

namespace Tests\Repositories;

use App\Models\Avion;
use App\Repositories\AvionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AvionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected AvionRepository $avionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->avionRepo = app(AvionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_avion()
    {
        $avion = Avion::factory()->make()->toArray();

        $createdAvion = $this->avionRepo->create($avion);

        $createdAvion = $createdAvion->toArray();
        $this->assertArrayHasKey('id', $createdAvion);
        $this->assertNotNull($createdAvion['id'], 'Created Avion must have id specified');
        $this->assertNotNull(Avion::find($createdAvion['id']), 'Avion with given id must be in DB');
        $this->assertModelData($avion, $createdAvion);
    }

    /**
     * @test read
     */
    public function test_read_avion()
    {
        $avion = Avion::factory()->create();

        $dbAvion = $this->avionRepo->find($avion->id);

        $dbAvion = $dbAvion->toArray();
        $this->assertModelData($avion->toArray(), $dbAvion);
    }

    /**
     * @test update
     */
    public function test_update_avion()
    {
        $avion = Avion::factory()->create();
        $fakeAvion = Avion::factory()->make()->toArray();

        $updatedAvion = $this->avionRepo->update($fakeAvion, $avion->id);

        $this->assertModelData($fakeAvion, $updatedAvion->toArray());
        $dbAvion = $this->avionRepo->find($avion->id);
        $this->assertModelData($fakeAvion, $dbAvion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_avion()
    {
        $avion = Avion::factory()->create();

        $resp = $this->avionRepo->delete($avion->id);

        $this->assertTrue($resp);
        $this->assertNull(Avion::find($avion->id), 'Avion should not exist in DB');
    }
}
