<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecostumerRequest;
use App\Http\Requests\UpdatecostumerRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\costumerRepository;
use Illuminate\Http\Request;
use Flash;

class costumerController extends AppBaseController
{
    /** @var costumerRepository $costumerRepository*/
    private $costumerRepository;

    public function __construct(costumerRepository $costumerRepo)
    {
        $this->costumerRepository = $costumerRepo;
    }

    /**
     * Display a listing of the costumer.
     */
    public function index(Request $request)
    {
        $costumers = $this->costumerRepository->paginate(10);

        return view('costumers.index')
            ->with('costumers', $costumers);
    }

    /**
     * Show the form for creating a new costumer.
     */
    public function create()
    {
        return view('costumers.create');
    }

    /**
     * Store a newly created costumer in storage.
     */
    public function store(CreatecostumerRequest $request)
    {
        $input = $request->all();

        $costumer = $this->costumerRepository->create($input);

        Flash::success('Costumer saved successfully.');

        return redirect(route('costumers.index'));
    }

    /**
     * Display the specified costumer.
     */
    public function show($id)
    {
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            Flash::error('Costumer not found');

            return redirect(route('costumers.index'));
        }

        return view('costumers.show')->with('costumer', $costumer);
    }

    /**
     * Show the form for editing the specified costumer.
     */
    public function edit($id)
    {
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            Flash::error('Costumer not found');

            return redirect(route('costumers.index'));
        }

        return view('costumers.edit')->with('costumer', $costumer);
    }

    /**
     * Update the specified costumer in storage.
     */
    public function update($id, UpdatecostumerRequest $request)
    {
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            Flash::error('Costumer not found');

            return redirect(route('costumers.index'));
        }

        $costumer = $this->costumerRepository->update($request->all(), $id);

        Flash::success('Costumer updated successfully.');

        return redirect(route('costumers.index'));
    }

    /**
     * Remove the specified costumer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            Flash::error('Costumer not found');

            return redirect(route('costumers.index'));
        }

        $this->costumerRepository->delete($id);

        Flash::success('Costumer deleted successfully.');

        return redirect(route('costumers.index'));
    }
}
