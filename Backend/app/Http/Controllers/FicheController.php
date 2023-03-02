<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFicheRequest;
use App\Http\Requests\UpdateFicheRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FicheRepository;
use Illuminate\Http\Request;
use Flash;

class FicheController extends AppBaseController
{
    /** @var FicheRepository $ficheRepository*/
    private $ficheRepository;

    public function __construct(FicheRepository $ficheRepo)
    {
        $this->ficheRepository = $ficheRepo;
    }

    /**
     * Display a listing of the Fiche.
     */
    public function index(Request $request)
    {
        $fiches = $this->ficheRepository->paginate(10);

        return view('fiches.index')
            ->with('fiches', $fiches);
    }

    /**
     * Show the form for creating a new Fiche.
     */
    public function create()
    {
        return view('fiches.create');
    }

    /**
     * Store a newly created Fiche in storage.
     */
    public function store(CreateFicheRequest $request)
    {
        $input = $request->all();

        $fiche = $this->ficheRepository->create($input);

        Flash::success('Fiche saved successfully.');

        return redirect(route('fiches.index'));
    }

    /**
     * Display the specified Fiche.
     */
    public function show($id)
    {
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            Flash::error('Fiche not found');

            return redirect(route('fiches.index'));
        }

        return view('fiches.show')->with('fiche', $fiche);
    }

    /**
     * Show the form for editing the specified Fiche.
     */
    public function edit($id)
    {
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            Flash::error('Fiche not found');

            return redirect(route('fiches.index'));
        }

        return view('fiches.edit')->with('fiche', $fiche);
    }

    /**
     * Update the specified Fiche in storage.
     */
    public function update($id, UpdateFicheRequest $request)
    {
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            Flash::error('Fiche not found');

            return redirect(route('fiches.index'));
        }

        $fiche = $this->ficheRepository->update($request->all(), $id);

        Flash::success('Fiche updated successfully.');

        return redirect(route('fiches.index'));
    }

    /**
     * Remove the specified Fiche from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            Flash::error('Fiche not found');

            return redirect(route('fiches.index'));
        }

        $this->ficheRepository->delete($id);

        Flash::success('Fiche deleted successfully.');

        return redirect(route('fiches.index'));
    }
}
