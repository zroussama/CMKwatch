<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepersonneRequest;
use App\Http\Requests\UpdatepersonneRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\personneRepository;
use Illuminate\Http\Request;
use Flash;

class personneController extends AppBaseController
{
    /** @var personneRepository $personneRepository*/
    private $personneRepository;

    public function __construct(personneRepository $personneRepo)
    {
        $this->personneRepository = $personneRepo;
    }

    /**
     * Display a listing of the personne.
     */
    public function index(Request $request)
    {
        $personnes = $this->personneRepository->paginate(10);

        return view('personnes.index')
            ->with('personnes', $personnes);
    }

    /**
     * Show the form for creating a new personne.
     */
    public function create()
    {
        return view('personnes.create');
    }

    /**
     * Store a newly created personne in storage.
     */
    public function store(CreatepersonneRequest $request)
    {
        $input = $request->all();

        $personne = $this->personneRepository->create($input);

        Flash::success('Personne saved successfully.');

        return redirect(route('personnes.index'));
    }

    /**
     * Display the specified personne.
     */
    public function show($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        return view('personnes.show')->with('personne', $personne);
    }

    /**
     * Show the form for editing the specified personne.
     */
    public function edit($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        return view('personnes.edit')->with('personne', $personne);
    }

    /**
     * Update the specified personne in storage.
     */
    public function update($id, UpdatepersonneRequest $request)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        $personne = $this->personneRepository->update($request->all(), $id);

        Flash::success('Personne updated successfully.');

        return redirect(route('personnes.index'));
    }

    /**
     * Remove the specified personne from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        $this->personneRepository->delete($id);

        Flash::success('Personne deleted successfully.');

        return redirect(route('personnes.index'));
    }
}
