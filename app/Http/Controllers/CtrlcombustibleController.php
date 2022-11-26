<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Combustible;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AppBaseController;
use App\DataTables\CtrlcombustibleDataTable;
use App\Repositories\CtrlcombustibleRepository;
use App\Http\Requests\CreateCtrlcombustibleRequest;
use App\Http\Requests\UpdateCtrlcombustibleRequest;

class CtrlcombustibleController extends AppBaseController
{
    /** @var CtrlcombustibleRepository $ctrlcombustibleRepository*/
    private $ctrlcombustibleRepository;

    public function __construct(CtrlcombustibleRepository $ctrlcombustibleRepo)
    {
        $this->ctrlcombustibleRepository = $ctrlcombustibleRepo;
    }

    /**
     * Display a listing of the Ctrlcombustible.
     */
    public function index(CtrlcombustibleDataTable $ctrlcombustibleDataTable)
    {
    return $ctrlcombustibleDataTable->render('ctrlcombustibles.index');
    }


    /**
     * Show the form for creating a new Ctrlcombustible.
     */
    public function create()
    {
        $vehiculos = Vehiculo::pluck('chapa', 'id');
        $combustibles = Combustible::pluck('nombre', 'id');

        return view('ctrlcombustibles.create', ['vehiculos' => $vehiculos, 'combustibles' => $combustibles]);
    }

    /**
     * Store a newly created Ctrlcombustible in storage.
     */
    public function store(CreateCtrlcombustibleRequest $request)
    {
        $input = $request->all();

        $ctrlcombustible = $this->ctrlcombustibleRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Control agregado satisfactoriamente');

        return redirect(route('ctrlcombustibles.index'));
    }

    /**
     * Display the specified Ctrlcombustible.
     */
    public function show($id)
    {
        $ctrlcombustible = $this->ctrlcombustibleRepository->find($id);

        if (empty($ctrlcombustible)) {
            Alert::info('Registro no encontrado');

            return redirect(route('ctrlcombustibles.index'));
        }

        return view('ctrlcombustibles.show')->with('ctrlcombustible', $ctrlcombustible);
    }

    /**
     * Show the form for editing the specified Ctrlcombustible.
     */
    public function edit($id)
    {
        $ctrlcombustible = $this->ctrlcombustibleRepository->find($id);

        $vehiculos = Vehiculo::pluck('chapa', 'id');
        $combustibles = Combustible::pluck('nombre', 'id');

        if (empty($ctrlcombustible)) {
            Alert::info('Registro no encontrado');

            return redirect(route('ctrlcombustibles.index'));
        }

        return view('ctrlcombustibles.edit')->with(['ctrlcombustible' => $ctrlcombustible, 'vehiculos' => $vehiculos, 'combustibles' => $combustibles]);
    }

    /**
     * Update the specified Ctrlcombustible in storage.
     */
    public function update($id, UpdateCtrlcombustibleRequest $request)
    {
        $ctrlcombustible = $this->ctrlcombustibleRepository->find($id);

        if (empty($ctrlcombustible)) {
            Alert::info('Registro no encontrado');

            return redirect(route('ctrlcombustibles.index'));
        }

        $ctrlcombustible = $this->ctrlcombustibleRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Control modificado satisfactoriamente');

        return redirect(route('ctrlcombustibles.index'));
    }

    /**
     * Remove the specified Ctrlcombustible from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ctrlcombustible = $this->ctrlcombustibleRepository->find($id);

        if (empty($ctrlcombustible)) {
            Alert::info('Registro no encontrado');

            return redirect(route('ctrlcombustibles.index'));
        }

        $this->ctrlcombustibleRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Control eliminado satisfactoriamente');

        return redirect(route('ctrlcombustibles.index'));
    }
}
