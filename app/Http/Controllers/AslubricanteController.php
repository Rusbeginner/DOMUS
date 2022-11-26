<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Vehiculo;
use App\Models\Lubricante;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\AslubricanteDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AslubricanteRepository;
use App\Http\Requests\CreateAslubricanteRequest;
use App\Http\Requests\UpdateAslubricanteRequest;

class AslubricanteController extends AppBaseController
{
    /** @var AslubricanteRepository $aslubricanteRepository*/
    private $aslubricanteRepository;

    public function __construct(AslubricanteRepository $aslubricanteRepo)
    {
        $this->aslubricanteRepository = $aslubricanteRepo;
    }

    /**
     * Display a listing of the Aslubricante.
     */
    public function index(AslubricanteDataTable $aslubricanteDataTable)
    {
    return $aslubricanteDataTable->render('aslubricantes.index');
    }


    /**
     * Show the form for creating a new Aslubricante.
     */
    public function create()
    {
        $vehiculos = Vehiculo::pluck('chapa','id');
        $lubricantes = Lubricante::pluck('nombre','id');

        return view('aslubricantes.create',['vehiculos' => $vehiculos, 'lubricantes' => $lubricantes]);
    }

    /**
     * Store a newly created Aslubricante in storage.
     */
    public function store(CreateAslubricanteRequest $request)
    {
        $input = $request->all();

        $aslubricante = $this->aslubricanteRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Asignación realizada satisfactoriamente');
        return redirect(route('aslubricantes.index'));
    }

    /**
     * Display the specified Aslubricante.
     */
    public function show($id)
    {
        $aslubricante = $this->aslubricanteRepository->find($id);

        if (empty($aslubricante)) {
            Alert::info('Registro no encontrado', 'No existe la asignación');

            return redirect(route('aslubricantes.index'));
        }

        return view('aslubricantes.show')->with('aslubricante', $aslubricante);
    }

    /**
     * Show the form for editing the specified Aslubricante.
     */
    public function edit($id)
    {

        $aslubricante = $this->aslubricanteRepository->find($id);
        //dd($aslubricante->id);

        $vehiculos = Vehiculo::pluck('chapa','id');
        $lubricantes = Lubricante::pluck('nombre','id');

        if (empty($aslubricante)) {
            Alert::info('Registro no encontrado', 'No existe la asignación');

            return redirect(route('aslubricantes.index'));
        }

        return view('aslubricantes.edit')->with(['aslubricante' => $aslubricante, 'vehiculos' => $vehiculos, 'lubricantes' => $lubricantes]);
    }

    /**
     * Update the specified Aslubricante in storage.
     */
    public function update($id, UpdateAslubricanteRequest $request)
    {
        $aslubricante = $this->aslubricanteRepository->find($id);

        if (empty($aslubricante)) {
            Alert::info('Registro no encontrado', 'No existe la asignación');

            return redirect(route('aslubricantes.index'));
        }

        $aslubricante = $this->aslubricanteRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Asignación modificada satisfactoriamente');

        return redirect(route('aslubricantes.index'));
    }

    /**
     * Remove the specified Aslubricante from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aslubricante = $this->aslubricanteRepository->find($id);

        if (empty($aslubricante)) {
            Alert::info('Registro no encontrado', 'No existe la asignación');

            return redirect(route('aslubricantes.index'));
        }

        $this->aslubricanteRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Asignación eliminada satisfactoriamente');


        return redirect(route('aslubricantes.index'));
    }
}
