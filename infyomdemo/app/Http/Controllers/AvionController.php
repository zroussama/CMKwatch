<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAvionRequest;
use App\Http\Requests\UpdateAvionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AvionRepository;
use Illuminate\Http\Request;
use Flash;

class AvionController extends AppBaseController
{
    /** @var AvionRepository $avionRepository*/
    private $avionRepository;

    public function __construct(AvionRepository $avionRepo)
    {
        $this->avionRepository = $avionRepo;
    }

    /**
     * Display a listing of the Avion.
     */
    public function index(Request $request)
    {
        $avions = $this->avionRepository->paginate(10);

        return view('avions.index')
            ->with('avions', $avions);
    }

    /**
     * Show the form for creating a new Avion.
     */
    public function create()
    {
        return view('avions.create');
    }

    /**
     * Store a newly created Avion in storage.
     */
    public function store(CreateAvionRequest $request)
    {
        $input = $request->all();

        $avion = $this->avionRepository->create($input);

        Flash::success('Avion saved successfully.');

        return redirect(route('avions.index'));
    }

    /**
     * Display the specified Avion.
     */
    public function show($id)
    {
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            Flash::error('Avion not found');

            return redirect(route('avions.index'));
        }

        return view('avions.show')->with('avion', $avion);
    }

    /**
     * Show the form for editing the specified Avion.
     */
    public function edit($id)
    {
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            Flash::error('Avion not found');

            return redirect(route('avions.index'));
        }

        return view('avions.edit')->with('avion', $avion);
    }

    /**
     * Update the specified Avion in storage.
     */
    public function update($id, UpdateAvionRequest $request)
    {
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            Flash::error('Avion not found');

            return redirect(route('avions.index'));
        }

        $avion = $this->avionRepository->update($request->all(), $id);

        Flash::success('Avion updated successfully.');

        return redirect(route('avions.index'));
    }

    /**
     * Remove the specified Avion from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $avion = $this->avionRepository->find($id);

        if (empty($avion)) {
            Flash::error('Avion not found');

            return redirect(route('avions.index'));
        }

        $this->avionRepository->delete($id);

        Flash::success('Avion deleted successfully.');

        return redirect(route('avions.index'));
    }
}
