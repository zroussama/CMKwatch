<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoitureAPIRequest;
use App\Http\Requests\API\UpdateVoitureAPIRequest;
use App\Models\Voiture;
use App\Repositories\VoitureRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class VoitureAPIController
 */
class VoitureAPIController extends AppBaseController
{
    private VoitureRepository $voitureRepository;

    public function __construct(VoitureRepository $voitureRepo)
    {
        $this->voitureRepository = $voitureRepo;
    }

    /**
     * Display a listing of the Voitures.
     * GET|HEAD /voitures
     */
    public function index(Request $request): JsonResponse
    {
        $voitures = $this->voitureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($voitures->toArray(), 'Voitures retrieved successfully');
    }

    /**
     * Store a newly created Voiture in storage.
     * POST /voitures
     */
    public function store(CreateVoitureAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $voiture = $this->voitureRepository->create($input);

        return $this->sendResponse($voiture->toArray(), 'Voiture saved successfully');
    }

    /**
     * Display the specified Voiture.
     * GET|HEAD /voitures/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Voiture $voiture */
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            return $this->sendError('Voiture not found');
        }

        return $this->sendResponse($voiture->toArray(), 'Voiture retrieved successfully');
    }

    /**
     * Update the specified Voiture in storage.
     * PUT/PATCH /voitures/{id}
     */
    public function update($id, UpdateVoitureAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Voiture $voiture */
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            return $this->sendError('Voiture not found');
        }

        $voiture = $this->voitureRepository->update($input, $id);

        return $this->sendResponse($voiture->toArray(), 'Voiture updated successfully');
    }

    /**
     * Remove the specified Voiture from storage.
     * DELETE /voitures/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Voiture $voiture */
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            return $this->sendError('Voiture not found');
        }

        $voiture->delete();

        return $this->sendSuccess('Voiture deleted successfully');
    }
}
