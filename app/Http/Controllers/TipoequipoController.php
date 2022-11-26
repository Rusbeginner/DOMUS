<?php

namespace App\Http\Controllers;

use App\DataTables\TipoequipoDataTable;
use App\Http\Requests\CreateTipoequipoRequest;
use App\Http\Requests\UpdateTipoequipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipoequipoRepository;
use Illuminate\Http\Request;
use Flash;

class TipoequipoController extends AppBaseController
{
    /** @var TipoequipoRepository $tipoequipoRepository*/
    private $tipoequipoRepository;

    public function __construct(TipoequipoRepository $tipoequipoRepo)
    {
        $this->tipoequipoRepository = $tipoequipoRepo;
    }

    /**
     * Display a listing of the Tipoequipo.
     */
    public function index(TipoequipoDataTable $tipoequipoDataTable)
    {
    return $tipoequipoDataTable->render('tipoequipos.index');
    }


    /**
     * Show the form for creating a new Tipoequipo.
     */
    public function create()
    {
        return view('tipoequipos.create');
    }

    /**
     * Store a newly created Tipoequipo in storage.
     */
    public function store(CreateTipoequipoRequest $request)
    {
        $input = $request->all();

        $tipoequipo = $this->tipoequipoRepository->create($input);

        Flash::success('Tipoequipo saved successfully.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Display the specified Tipoequipo.
     */
    public function show($id)
    {
        $tipoequipo = $this->tipoequipoRepository->find($id);

        if (empty($tipoequipo)) {
            Flash::error('Tipoequipo not found');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.show')->with('tipoequipo', $tipoequipo);
    }

    /**
     * Show the form for editing the specified Tipoequipo.
     */
    public function edit($id)
    {
        $tipoequipo = $this->tipoequipoRepository->find($id);

        if (empty($tipoequipo)) {
            Flash::error('Tipoequipo not found');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.edit')->with('tipoequipo', $tipoequipo);
    }

    /**
     * Update the specified Tipoequipo in storage.
     */
    public function update($id, UpdateTipoequipoRequest $request)
    {
        $tipoequipo = $this->tipoequipoRepository->find($id);

        if (empty($tipoequipo)) {
            Flash::error('Tipoequipo not found');

            return redirect(route('tipoequipos.index'));
        }

        $tipoequipo = $this->tipoequipoRepository->update($request->all(), $id);

        Flash::success('Tipoequipo updated successfully.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Remove the specified Tipoequipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoequipo = $this->tipoequipoRepository->find($id);

        if (empty($tipoequipo)) {
            Flash::error('Tipoequipo not found');

            return redirect(route('tipoequipos.index'));
        }

        $this->tipoequipoRepository->delete($id);

        Flash::success('Tipoequipo deleted successfully.');

        return redirect(route('tipoequipos.index'));
    }
}
