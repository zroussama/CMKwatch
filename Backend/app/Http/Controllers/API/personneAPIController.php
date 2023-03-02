<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepersonneAPIRequest;
use App\Http\Requests\API\UpdatepersonneAPIRequest;
use App\Models\personne;
use App\Repositories\personneRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class personneAPIController
 */
class personneAPIController extends AppBaseController
{
    private personneRepository $personneRepository;

    public function __construct(personneRepository $personneRepo)
    {
        $this->personneRepository = $personneRepo;
    }

    /**
     * Display a listing of the personnes.
     * GET|HEAD /personnes
     */
    public function index(Request $request): JsonResponse
    {
        $personnes = $this->personneRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personnes->toArray(), 'Personnes retrieved successfully');
    }

    /**
     * Store a newly created personne in storage.
     * POST /personnes
     */
    public function store(CreatepersonneAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $personne = $this->personneRepository->create($input);

        return $this->sendResponse($personne->toArray(), 'Personne saved successfully');
    }

    /**
     * Display the specified personne.
     * GET|HEAD /personnes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        return $this->sendResponse($personne->toArray(), 'Personne retrieved successfully');
    }

    /**
     * Update the specified personne in storage.
     * PUT/PATCH /personnes/{id}
     */
    public function update($id, UpdatepersonneAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        $personne = $this->personneRepository->update($input, $id);

        return $this->sendResponse($personne->toArray(), 'personne updated successfully');
    }

    /**
     * Remove the specified personne from storage.
     * DELETE /personnes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        $personne->delete();

        return $this->sendSuccess('Personne deleted successfully');
    }
}
