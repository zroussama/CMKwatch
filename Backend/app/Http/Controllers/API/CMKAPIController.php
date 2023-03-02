<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCMKAPIRequest;
use App\Http\Requests\API\UpdateCMKAPIRequest;
use App\Models\CMK;
use App\Repositories\CMKRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CMKAPIController
 */
class CMKAPIController extends AppBaseController
{
    private CMKRepository $cMKRepository;

    public function __construct(CMKRepository $cMKRepo)
    {
        $this->cMKRepository = $cMKRepo;
    }

    /**
     * Display a listing of the CMKS.
     * GET|HEAD /c-m-k-s
     */
    public function index(Request $request): JsonResponse
    {
        $cMKS = $this->cMKRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cMKS->toArray(), 'C M K S retrieved successfully');
    }

    /**
     * Store a newly created CMK in storage.
     * POST /c-m-k-s
     */
    public function store(CreateCMKAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cMK = $this->cMKRepository->create($input);

        return $this->sendResponse($cMK->toArray(), 'C M K saved successfully');
    }

    /**
     * Display the specified CMK.
     * GET|HEAD /c-m-k-s/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CMK $cMK */
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            return $this->sendError('C M K not found');
        }

        return $this->sendResponse($cMK->toArray(), 'C M K retrieved successfully');
    }

    /**
     * Update the specified CMK in storage.
     * PUT/PATCH /c-m-k-s/{id}
     */
    public function update($id, UpdateCMKAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CMK $cMK */
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            return $this->sendError('C M K not found');
        }

        $cMK = $this->cMKRepository->update($input, $id);

        return $this->sendResponse($cMK->toArray(), 'CMK updated successfully');
    }

    /**
     * Remove the specified CMK from storage.
     * DELETE /c-m-k-s/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CMK $cMK */
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            return $this->sendError('C M K not found');
        }

        $cMK->delete();

        return $this->sendSuccess('C M K deleted successfully');
    }
}
