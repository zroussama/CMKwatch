<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecostumerAPIRequest;
use App\Http\Requests\API\UpdatecostumerAPIRequest;
use App\Models\costumer;
use App\Repositories\costumerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class costumerAPIController
 */
class costumerAPIController extends AppBaseController
{
    private costumerRepository $costumerRepository;

    public function __construct(costumerRepository $costumerRepo)
    {
        $this->costumerRepository = $costumerRepo;
    }

    /**
     * Display a listing of the costumers.
     * GET|HEAD /costumers
     */
    public function index(Request $request): JsonResponse
    {
        $costumers = $this->costumerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($costumers->toArray(), 'Costumers retrieved successfully');
    }

    /**
     * Store a newly created costumer in storage.
     * POST /costumers
     */
    public function store(CreatecostumerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $costumer = $this->costumerRepository->create($input);

        return $this->sendResponse($costumer->toArray(), 'Costumer saved successfully');
    }

    /**
     * Display the specified costumer.
     * GET|HEAD /costumers/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        return $this->sendResponse($costumer->toArray(), 'Costumer retrieved successfully');
    }

    /**
     * Update the specified costumer in storage.
     * PUT/PATCH /costumers/{id}
     */
    public function update($id, UpdatecostumerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        $costumer = $this->costumerRepository->update($input, $id);

        return $this->sendResponse($costumer->toArray(), 'costumer updated successfully');
    }

    /**
     * Remove the specified costumer from storage.
     * DELETE /costumers/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        $costumer->delete();

        return $this->sendSuccess('Costumer deleted successfully');
    }
}