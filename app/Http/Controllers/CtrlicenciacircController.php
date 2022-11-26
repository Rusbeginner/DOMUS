<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use App\DataTables\CtrlicenciacircDataTable;
use App\Models\Ctrlicenciacirc;
use App\Http\Requests\CreateCtrlicenciacircRequest;
use App\Http\Requests\UpdateCtrlicenciacircRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CtrlicenciacircRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CtrlicenciacircController extends AppBaseController
{
    /** @var CtrlicenciacircRepository $ctrlicenciacircRepository*/
    private $ctrlicenciacircRepository;

    public function __construct(CtrlicenciacircRepository $ctrlicenciacircRepo)
    {
        $this->ctrlicenciacircRepository = $ctrlicenciacircRepo;
    }

    /**
     * Display a listing of the Ctrlicenciacirc.
     */
    public function index(CtrlicenciacircDataTable $ctrlicenciacircDataTable)
    {
    return $ctrlicenciacircDataTable->render('ctrlicenciacircs.index');
    }


    /**
     * Show the form for creating a new Ctrlicenciacirc.
     */
    public function create()
    {

        $vehiculos = Vehiculo::doesntHave('ctrlicenciacircs')->get(['vehiculos.chapa', 'vehiculos.id'])->pluck('chapa', 'id');
        return view('ctrlicenciacircs.create',['vehiculos' => $vehiculos]);
    }

    /**
     * Store a newly created Ctrlicenciacirc in storage.
     */
    public function store(CreateCtrlicenciacircRequest $request)
    {
        $input = $request->all();

        $ctrlicenciacirc = $this->ctrlicenciacircRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Licencia de circulación agregada satisfactoriamente');

        return redirect(route('ctrlicenciacircs.index'));
    }

    /**
     * Display the specified Ctrlicenciacirc.
     */
    public function show($id)
    {
        $ctrlicenciacirc = $this->ctrlicenciacircRepository->find($id);

        if (empty($ctrlicenciacirc)) {
            Flash::error('Ctrlicenciacirc not found');

            return redirect(route('ctrlicenciacircs.index'));
        }

        return view('ctrlicenciacircs.show')->with('ctrlicenciacirc', $ctrlicenciacirc);
    }

    /**
     * Show the form for editing the specified Ctrlicenciacirc.
     */
    public function edit($id)
    {
        $ctrlicenciacirc = $this->ctrlicenciacircRepository->find($id);

        //obtengo vehiculo asociado a esta licencia operativa
        $vehiculo = Vehiculo::Where('id', $ctrlicenciacirc->vehiculo_id)->pluck('chapa', 'id');

        //obtengo vehiculos que no tienen licencia operativa
        $vehiculos = Vehiculo::doesntHave('ctrlicenciacircs')->get(['vehiculos.chapa', 'vehiculos.id'])->pluck('chapa', 'id');

        //realizo la union para pasar estos datos a la vista de editar

        $allvehicles = $vehiculo->union($vehiculos);

        if (empty($ctrlicenciacirc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia de circulación');

            return redirect(route('ctrlicenciacircs.index'));
        }

        return view('ctrlicenciacircs.edit')->with(['ctrlicenciacirc' => $ctrlicenciacirc, 'vehiculos' =>$allvehicles]);
    }

    /**
     * Update the specified Ctrlicenciacirc in storage.
     */
    public function update($id, UpdateCtrlicenciacircRequest $request)
    {
        $ctrlicenciacirc = $this->ctrlicenciacircRepository->find($id);

        if (empty($ctrlicenciacirc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia de circulación');

            return redirect(route('ctrlicenciacircs.index'));
        }

        $ctrlicenciacirc = $this->ctrlicenciacircRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Licencia de circulación modificada satisfactoriamente');

        return redirect(route('ctrlicenciacircs.index'));
    }

    /**
     * Remove the specified Ctrlicenciacirc from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ctrlicenciacirc = $this->ctrlicenciacircRepository->find($id);

        if (empty($ctrlicenciacirc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia de circulación');

            return redirect(route('ctrlicenciacircs.index'));
        }

        $this->ctrlicenciacircRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Licencia de circulación eliminada satisfactoriamente');

        return redirect(route('ctrlicenciacircs.index'));
    }

    public function guardar_pdf()    
    {
        $licenciass = Vehiculo::join('ctrlicenciacircs', 'ctrlicenciacircs.vehiculo_id', '=', 'vehiculos.id')
            ->whereRaw('DATEDIFF(ctrlicenciacircs.fechavenc,current_date)  <= 60')
            ->get(['ctrlicenciacircs.*', 'vehiculos.chapa']);    
                
        $data = [
            'date' => date('d-m-Y'),
            'licencias' => $licenciass
        ];
        
        $pdf = PDF::loadView('ctrlicenciacircs.generar_pdf', $data);
        return  $pdf->download('licenciascircsaved.pdf');
    }
}
