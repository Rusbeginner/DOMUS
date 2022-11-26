<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Models\Tipolubricante;
use App\DataTables\LubricanteDataTable;
use App\Repositories\LubricanteRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateLubricanteRequest;
use App\Http\Requests\UpdateLubricanteRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LubricanteController extends AppBaseController
{
    /** @var LubricanteRepository $lubricanteRepository*/
    private $lubricanteRepository;

    public function __construct(LubricanteRepository $lubricanteRepo)
    {
        $this->lubricanteRepository = $lubricanteRepo;
    }

    /**
     * Display a listing of the Lubricante.
     */
    public function index(LubricanteDataTable $lubricanteDataTable)
    {
    return $lubricanteDataTable->render('lubricantes.index');
    }


    /**
     * Show the form for creating a new Lubricante.
     */
    public function create()
    {
        $tiposlubricantes = Tipolubricante::pluck('tipo', 'id');
        return view('lubricantes.create', ['tiposlubricantes' => $tiposlubricantes]);
    }

    /**
     * Store a newly created Lubricante in storage.
     */
    public function store(CreateLubricanteRequest $request)
    {
        $input = $request->all();

        $lubricante = $this->lubricanteRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Lubricante almacenado satisfactoriamente');
        
        return redirect(route('lubricantes.index'));
    }

    /**
     * Display the specified Lubricante.
     */
    public function show($id)
    {
        $lubricante = $this->lubricanteRepository->find($id);

        if (empty($lubricante)) {
            Flash::error('Lubricante not found');

            return redirect(route('lubricantes.index'));
        }

        return view('lubricantes.show')->with('lubricante', $lubricante);
    }

    /**
     * Show the form for editing the specified Lubricante.
     */
    public function edit($id)
    {
        $tiposlubricantes = Tipolubricante::pluck('tipo', 'id');

        $lubricante = $this->lubricanteRepository->find($id);

        if (empty($lubricante)) {
            Flash::error('Lubricante not found');

            return redirect(route('lubricantes.index'));
        }

        return view('lubricantes.edit')->with(['lubricante' => $lubricante, 'tiposlubricantes' => $tiposlubricantes]);
    }

    /**
     * Update the specified Lubricante in storage.
     */
    public function update($id, UpdateLubricanteRequest $request)
    {
        $lubricante = $this->lubricanteRepository->find($id);

        if (empty($lubricante)) {
            Flash::error('Lubricante not found');

            return redirect(route('lubricantes.index'));
        }

        $lubricante = $this->lubricanteRepository->update($request->all(), $id);

// example:
        Alert::success('Operación realizada con éxito', 'Lubricante modificado satisfactoriamente');


        return redirect(route('lubricantes.index'));
    }

    /**
     * Remove the specified Lubricante from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lubricante = $this->lubricanteRepository->find($id);

        if (empty($lubricante)) {
            Flash::error('Lubricante not found');

            return redirect(route('lubricantes.index'));
        }

        alert()->question('Está seguro de querer eliminar?','No se podrá revertir la operación')
                ->showConfirmButton('Eliminar', '#3085d6')
                ->showCancelButton('Cancelar', '#aaa')->reverseButtons();


        //$this->lubricanteRepository->delete($id);

        return redirect(route('lubricantes.index'));
    }
}
