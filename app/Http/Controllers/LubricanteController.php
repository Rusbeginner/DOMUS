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
            Alert::info('Registro no encontrado', 'No existe el lubricante');

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
            Alert::info('Registro no encontrado', 'No existe el lubricante');

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
            Alert::info('Registro no encontrado', 'No existe el lubricante');

            return redirect(route('lubricantes.index'));
        }

        $lubricante = $this->lubricanteRepository->update($request->all(), $id);

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

        if (empty($lubricante))
        {
            Alert::info('Registro no encontrado', 'No existe el lubricante');
            return redirect(route('lubricantes.index'));
        }

        //Chequear si tiene alguna asignacion , en ese caso no se puede eliminar
        $asignaciones = $lubricante->aslubricantes;

        if ($asignaciones->count() > 0)
        {
            Alert::warning('No se puede eliminar', 'Existe asignación asociada');
        }
        else
        {
            $this->lubricanteRepository->delete($id);
            Alert::success('Operación realizada con éxito', 'Lubricante eliminado satisfactoriamente');
        }

        return redirect(route('lubricantes.index'));
    }
}
