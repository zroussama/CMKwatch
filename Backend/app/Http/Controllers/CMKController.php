<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCMKRequest;
use App\Http\Requests\UpdateCMKRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CMKRepository;
use Illuminate\Http\Request;
use Flash;

class CMKController extends AppBaseController
{
    /** @var CMKRepository $cMKRepository*/
    private $cMKRepository;

    public function __construct(CMKRepository $cMKRepo)
    {
        $this->cMKRepository = $cMKRepo;
    }

    /**
     * Display a listing of the CMK.
     */
    public function index(Request $request)
    {
        $cMKS = $this->cMKRepository->paginate(10);

        return view('c_m_k_s.index')
            ->with('cMKS', $cMKS);
    }

    /**
     * Show the form for creating a new CMK.
     */
    public function create()
    {
        return view('c_m_k_s.create');
    }

    /**
     * Store a newly created CMK in storage.
     */
    public function store(CreateCMKRequest $request)
    {
        $input = $request->all();

        $cMK = $this->cMKRepository->create($input);

        Flash::success('C M K saved successfully.');

        return redirect(route('cMKS.index'));
    }

    /**
     * Display the specified CMK.
     */
    public function show($id)
    {
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            Flash::error('C M K not found');

            return redirect(route('cMKS.index'));
        }

        return view('c_m_k_s.show')->with('cMK', $cMK);
    }

    /**
     * Show the form for editing the specified CMK.
     */
    public function edit($id)
    {
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            Flash::error('C M K not found');

            return redirect(route('cMKS.index'));
        }

        return view('c_m_k_s.edit')->with('cMK', $cMK);
    }

    /**
     * Update the specified CMK in storage.
     */
    public function update($id, UpdateCMKRequest $request)
    {
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            Flash::error('C M K not found');

            return redirect(route('cMKS.index'));
        }

        $cMK = $this->cMKRepository->update($request->all(), $id);

        Flash::success('C M K updated successfully.');

        return redirect(route('cMKS.index'));
    }

    /**
     * Remove the specified CMK from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cMK = $this->cMKRepository->find($id);

        if (empty($cMK)) {
            Flash::error('C M K not found');

            return redirect(route('cMKS.index'));
        }

        $this->cMKRepository->delete($id);

        Flash::success('C M K deleted successfully.');

        return redirect(route('cMKS.index'));
    }
}
