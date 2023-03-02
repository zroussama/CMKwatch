<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateportfolioAPIRequest;
use App\Http\Requests\API\UpdateportfolioAPIRequest;
use App\Models\portfolio;
use App\Repositories\portfolioRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class portfolioAPIController
 */
class portfolioAPIController extends AppBaseController
{
    private portfolioRepository $portfolioRepository;

    public function __construct(portfolioRepository $portfolioRepo)
    {
        $this->portfolioRepository = $portfolioRepo;
    }

    /**
     * Display a listing of the portfolios.
     * GET|HEAD /portfolios
     */
    public function index(Request $request): JsonResponse
    {
        $portfolios = $this->portfolioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($portfolios->toArray(), 'Portfolios retrieved successfully');
    }

    /**
     * Store a newly created portfolio in storage.
     * POST /portfolios
     */
    public function store(CreateportfolioAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $portfolio = $this->portfolioRepository->create($input);

        return $this->sendResponse($portfolio->toArray(), 'Portfolio saved successfully');
    }

    /**
     * Display the specified portfolio.
     * GET|HEAD /portfolios/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var portfolio $portfolio */
        $portfolio = $this->portfolioRepository->find($id);

        if (empty($portfolio)) {
            return $this->sendError('Portfolio not found');
        }

        return $this->sendResponse($portfolio->toArray(), 'Portfolio retrieved successfully');
    }

    /**
     * Update the specified portfolio in storage.
     * PUT/PATCH /portfolios/{id}
     */
    public function update($id, UpdateportfolioAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var portfolio $portfolio */
        $portfolio = $this->portfolioRepository->find($id);

        if (empty($portfolio)) {
            return $this->sendError('Portfolio not found');
        }

        $portfolio = $this->portfolioRepository->update($input, $id);

        return $this->sendResponse($portfolio->toArray(), 'portfolio updated successfully');
    }

    /**
     * Remove the specified portfolio from storage.
     * DELETE /portfolios/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var portfolio $portfolio */
        $portfolio = $this->portfolioRepository->find($id);

        if (empty($portfolio)) {
            return $this->sendError('Portfolio not found');
        }

        $portfolio->delete();

        return $this->sendSuccess('Portfolio deleted successfully');
    }
}
