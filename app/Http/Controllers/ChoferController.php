<?php

namespace App\Http\Controllers;

use App\DataTables\ChoferDataTable;
use App\Http\Requests\CreateChoferRequest;
use App\Http\Requests\UpdateChoferRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ChoferRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;

class ChoferController extends AppBaseController
{
    /** @var ChoferRepository $choferRepository*/
    private $choferRepository;

    public function __construct(ChoferRepository $choferRepo)
    {
        $this->choferRepository = $choferRepo;
    }

    /**
     * Display a listing of the Chofer.
     */
    public function index(ChoferDataTable $choferDataTable)
    {
    return $choferDataTable->render('chofers.index');
    }


    /**
     * Show the form for creating a new Chofer.
     */
    public function create()
    {
        return view('chofers.create');
    }

    /**
     * Store a newly created Chofer in storage.
     */
    public function store(CreateChoferRequest $request)
    {
        $input = $request->all();

        $chofer = $this->choferRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Chofer agregado satisfactoriamente');

        return redirect(route('chofers.index'));
    }

    /**
     * Display the specified Chofer.
     */
    public function show($id)
    {
        $chofer = $this->choferRepository->find($id);

        if (empty($chofer)) {
            Alert::info('Registro no encontrado', 'No existe el chofer');

            return redirect(route('chofers.index'));
        }

        return view('chofers.show')->with('chofer', $chofer);
    }

    /**
     * Show the form for editing the specified Chofer.
     */
    public function edit($id)
    {
        $chofer = $this->choferRepository->find($id);

        if (empty($chofer)) {
            Alert::info('Registro no encontrado', 'No existe el chofer');

            return redirect(route('chofers.index'));
        }

        return view('chofers.edit')->with('chofer', $chofer);
    }

    /**
     * Update the specified Chofer in storage.
     */
    public function update($id, UpdateChoferRequest $request)
    {
        $chofer = $this->choferRepository->find($id);

        if (empty($chofer)) {
            Alert::info('Registro no encontrado', 'No existe el chofer');

            return redirect(route('chofers.index'));
        }

        $chofer = $this->choferRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Chofer actualizado satisfactoriamente');

        return redirect(route('chofers.index'));
    }

    /**
     * Remove the specified Chofer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chofer = $this->choferRepository->find($id);

        if (empty($chofer)) {
            Alert::info('Registro no encontrado', 'No existe el chofer');

            return redirect(route('chofers.index'));
        }

        //chequear si existen dependencias en cuyo caso no se puede eliminar

        $vehiculo = $chofer->vehiculo;
        if (!is_null($vehiculo))
        {
            if ($vehiculo->count() > 0)
                {
                    Alert::warning('No se puede eliminar', 'Existe vehículo asociado');
                }
        }
        elseif (!is_null($chofer->licenciaconduc))
        {
            if ($chofer->licenciaconduc->count() > 0)
                    {
                        Alert::warning('No se puede eliminar', 'Existe licencia de conducción asociada');
                    }
        }
                
        else
        {
            $this->choferRepository->delete($id);
            Alert::success('Operación realizada con éxito', 'Chofer eliminado satisfactoriamente');
        }
        
        return redirect(route('chofers.index'));
    }
}
