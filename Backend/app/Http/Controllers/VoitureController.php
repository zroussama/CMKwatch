<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVoitureRequest;
use App\Http\Requests\UpdateVoitureRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VoitureRepository;
use Illuminate\Http\Request;
use Flash;

class VoitureController extends AppBaseController
{
    /** @var VoitureRepository $voitureRepository*/
    private $voitureRepository;

    public function __construct(VoitureRepository $voitureRepo)
    {
        $this->voitureRepository = $voitureRepo;
    }

    /**
     * Display a listing of the Voiture.
     */
    public function index(Request $request)
    {
        $voitures = $this->voitureRepository->paginate(10);

        return view('voitures.index')
            ->with('voitures', $voitures);
    }

    /**
     * Show the form for creating a new Voiture.
     */
    public function create()
    {
        return view('voitures.create');
    }

    /**
     * Store a newly created Voiture in storage.
     */
    public function store(CreateVoitureRequest $request)
    {
        $input = $request->all();

        $voiture = $this->voitureRepository->create($input);

        Flash::success('Voiture saved successfully.');

        return redirect(route('voitures.index'));
    }

    /**
     * Display the specified Voiture.
     */
    public function show($id)
    {
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            Flash::error('Voiture not found');

            return redirect(route('voitures.index'));
        }

        return view('voitures.show')->with('voiture', $voiture);
    }

    /**
     * Show the form for editing the specified Voiture.
     */
    public function edit($id)
    {
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            Flash::error('Voiture not found');

            return redirect(route('voitures.index'));
        }

        return view('voitures.edit')->with('voiture', $voiture);
    }

    /**
     * Update the specified Voiture in storage.
     */
    public function update($id, UpdateVoitureRequest $request)
    {
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            Flash::error('Voiture not found');

            return redirect(route('voitures.index'));
        }

        $voiture = $this->voitureRepository->update($request->all(), $id);

        Flash::success('Voiture updated successfully.');

        return redirect(route('voitures.index'));
    }

    /**
     * Remove the specified Voiture from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $voiture = $this->voitureRepository->find($id);

        if (empty($voiture)) {
            Flash::error('Voiture not found');

            return redirect(route('voitures.index'));
        }

        $this->voitureRepository->delete($id);

        Flash::success('Voiture deleted successfully.');

        return redirect(route('voitures.index'));
    }
}
