<?php

namespace App\Http\Controllers;

use App\DataTables\CombustibleDataTable;
use App\Http\Requests\CreateCombustibleRequest;
use App\Http\Requests\UpdateCombustibleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CombustibleRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;

class CombustibleController extends AppBaseController
{
    /** @var CombustibleRepository $combustibleRepository*/
    private $combustibleRepository;

    public function __construct(CombustibleRepository $combustibleRepo)
    {
        $this->combustibleRepository = $combustibleRepo;
    }

    /**
     * Display a listing of the Combustible.
     */
    public function index(CombustibleDataTable $combustibleDataTable)
    {
    return $combustibleDataTable->render('combustibles.index');
    }


    /**
     * Show the form for creating a new Combustible.
     */
    public function create()
    {
        return view('combustibles.create');
    }

    /**
     * Store a newly created Combustible in storage.
     */
    public function store(CreateCombustibleRequest $request)
    {
        $input = $request->all();

        $combustible = $this->combustibleRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Combustible agregado satisfactoriamente');

        return redirect(route('combustibles.index'));
    }

    /**
     * Display the specified Combustible.
     */
    public function show($id)
    {
        $combustible = $this->combustibleRepository->find($id);

        if (empty($combustible)) {
            Alert::info('Registro no encontrado', 'No existe el combustible');

            return redirect(route('combustibles.index'));
        }

        return view('combustibles.show')->with('combustible', $combustible);
    }

    /**
     * Show the form for editing the specified Combustible.
     */
    public function edit($id)
    {
        $combustible = $this->combustibleRepository->find($id);

        if (empty($combustible)) {
            Alert::info('Registro no encontrado', 'No existe el combustible');

            return redirect(route('combustibles.index'));
        }

        return view('combustibles.edit')->with('combustible', $combustible);
    }

    /**
     * Update the specified Combustible in storage.
     */
    public function update($id, UpdateCombustibleRequest $request)
    {
        $combustible = $this->combustibleRepository->find($id);

        if (empty($combustible)) {
            Alert::info('Registro no encontrado', 'No existe el combustible');

            return redirect(route('combustibles.index'));
        }

        $combustible = $this->combustibleRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Combustible modificado satisfactoriamente');

        return redirect(route('combustibles.index'));
    }

    /**
     * Remove the specified Combustible from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $combustible = $this->combustibleRepository->find($id);

        if (empty($combustible)) {
            Alert::info('Registro no encontrado', 'No existe el combustible');

            return redirect(route('combustibles.index'));
        }

        $this->combustibleRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Combustible eliminado satisfactoriamente');

        return redirect(route('combustibles.index'));
    }
}
