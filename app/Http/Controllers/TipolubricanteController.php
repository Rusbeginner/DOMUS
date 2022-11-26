<?php

namespace App\Http\Controllers;

use App\DataTables\TipolubricanteDataTable;
use App\Http\Requests\CreateTipolubricanteRequest;
use App\Http\Requests\UpdateTipolubricanteRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipolubricanteRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;

class TipolubricanteController extends AppBaseController
{
    /** @var TipolubricanteRepository $tipolubricanteRepository*/
    private $tipolubricanteRepository;

    public function __construct(TipolubricanteRepository $tipolubricanteRepo)
    {
        $this->tipolubricanteRepository = $tipolubricanteRepo;
    }

    /**
     * Display a listing of the Tipolubricante.
     */
    public function index(TipolubricanteDataTable $tipolubricanteDataTable)
    {
    return $tipolubricanteDataTable->render('tipolubricantes.index');
    }


    /**
     * Show the form for creating a new Tipolubricante.
     */
    public function create()
    {
        return view('tipolubricantes.create');
    }

    /**
     * Store a newly created Tipolubricante in storage.
     */
    public function store(CreateTipolubricanteRequest $request)
    {
        $input = $request->all();

        $tipolubricante = $this->tipolubricanteRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Tipo de lubricante agregado satisfactoriamente');

        return redirect(route('tipolubricantes.index'));
    }

    /**
     * Display the specified Tipolubricante.
     */
    public function show($id)
    {
        $tipolubricante = $this->tipolubricanteRepository->find($id);

        if (empty($tipolubricante)) {
            Alert::info('Registro no encontrado', 'No existe el tipo de lubricante');

            return redirect(route('tipolubricantes.index'));
        }

        return view('tipolubricantes.show')->with('tipolubricante', $tipolubricante);
    }

    /**
     * Show the form for editing the specified Tipolubricante.
     */
    public function edit($id)
    {
        $tipolubricante = $this->tipolubricanteRepository->find($id);

        if (empty($tipolubricante)) {
            Alert::info('Registro no encontrado', 'No existe el tipo de lubricante');

            return redirect(route('tipolubricantes.index'));
        }

        return view('tipolubricantes.edit')->with('tipolubricante', $tipolubricante);
    }

    /**
     * Update the specified Tipolubricante in storage.
     */
    public function update($id, UpdateTipolubricanteRequest $request)
    {
        $tipolubricante = $this->tipolubricanteRepository->find($id);

        if (empty($tipolubricante)) {
            Alert::info('Registro no encontrado', 'No existe el tipo de lubricante');

            return redirect(route('tipolubricantes.index'));
        }

        $tipolubricante = $this->tipolubricanteRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Tipo de lubricante modificado satisfactoriamente');

        return redirect(route('tipolubricantes.index'));
    }

    /**
     * Remove the specified Tipolubricante from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipolubricante = $this->tipolubricanteRepository->find($id);

        if (empty($tipolubricante)) {
            Alert::info('Registro no encontrado', 'No existe el tipo de lubricante');

            return redirect(route('tipolubricantes.index'));
        }

        //chequear si hay algun lubricante asociado 

        $lubricantes = $tipolubricante->lubricantes;

        if ($lubricantes->count() > 0)
        {
            Alert::warning('No se puede eliminar', 'Existe lubricante asociado');
        }
        else
        {
             $this->tipolubricanteRepository->delete($id);

             Alert::success('Operación realizada con éxito', 'Tipo de lubricante eliminado satisfactoriamente');
        }
        

       

        return redirect(route('tipolubricantes.index'));
    }
}
