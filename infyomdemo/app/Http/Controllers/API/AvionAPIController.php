<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAvionAPIRequest;
use App\Http\Requests\API\UpdateAvionAPIRequest;
use App\Models\Avion;
use App\Repositories\AvionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class AvionAPIController
 */
class AvionAPIController extends AppBaseController
{
    private AvionRepository $avionRepository;

    public function __construct(AvionRepository $avionRepo)
    {
        $this->avionRepository = $avionRepo;
    }

    /**
     * Display a listing of the Avions.
     * GET|HEAD /avions
     */
    public function index(Request $request): JsonResponse
    {
        $avions = $this->avionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($avions->toArray(), 'Avions retrieved successfully');
    }

    /**
     * Store a newly created Avion in storage.
     * POST /avions
     */
    public function store(CreateAvionAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $avion = $this->avionRepository->create($input);

        return $this->sendResponse($avion->toArray(), 'Avion saved successfully');
    }

    /**
     * Display the specified Avion.
     * GET|HEAD /avions/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Avion $avion */
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            return $this->sendError('Avion not found');
        }

        return $this->sendResponse($avion->toArray(), 'Avion retrieved successfully');
    }

    /**
     * Update the specified Avion in storage.
     * PUT/PATCH /avions/{id}
     */
    public function update($id, UpdateAvionAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Avion $avion */
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            return $this->sendError('Avion not found');
        }

        $avion = $this->avionRepository->update($input, $id);

        return $this->sendResponse($avion->toArray(), 'Avion updated successfully');
    }

    /**
     * Remove the specified Avion from storage.
     * DELETE /avions/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Avion $avion */
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            return $this->sendError('Avion not found');
        }

        $avion->delete();

        return $this->sendSuccess('Avion deleted successfully');
    }
}
