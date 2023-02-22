<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConnectionRequest;
use App\Http\Requests\UpdateConnectionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ConnectionRepository;
use Illuminate\Http\Request;
use Flash;

class ConnectionController extends AppBaseController
{
    /** @var ConnectionRepository $connectionRepository*/
    private $connectionRepository;

    public function __construct(ConnectionRepository $connectionRepo)
    {
        $this->connectionRepository = $connectionRepo;
    }

    /**
     * Display a listing of the Connection.
     */
    public function index(Request $request)
    {
        $connections = $this->connectionRepository->paginate(10);

        return view('connections.index')
            ->with('connections', $connections);
    }

    /**
     * Show the form for creating a new Connection.
     */
    public function create()
    {
        return view('connections.create');
    }

    /**
     * Store a newly created Connection in storage.
     */
    public function store(CreateConnectionRequest $request)
    {
        $input = $request->all();

        $connection = $this->connectionRepository->create($input);

        Flash::success('Connection saved successfully.');

        return redirect(route('connections.index'));
    }

    /**
     * Display the specified Connection.
     */
    public function show($id)
    {
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            Flash::error('Connection not found');

            return redirect(route('connections.index'));
        }

        return view('connections.show')->with('connection', $connection);
    }

    /**
     * Show the form for editing the specified Connection.
     */
    public function edit($id)
    {
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            Flash::error('Connection not found');

            return redirect(route('connections.index'));
        }

        return view('connections.edit')->with('connection', $connection);
    }

    /**
     * Update the specified Connection in storage.
     */
    public function update($id, UpdateConnectionRequest $request)
    {
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            Flash::error('Connection not found');

            return redirect(route('connections.index'));
        }

        $connection = $this->connectionRepository->update($request->all(), $id);

        Flash::success('Connection updated successfully.');

        return redirect(route('connections.index'));
    }

    /**
     * Remove the specified Connection from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            Flash::error('Connection not found');

            return redirect(route('connections.index'));
        }

        $this->connectionRepository->delete($id);

        Flash::success('Connection deleted successfully.');

        return redirect(route('connections.index'));
    }
}
