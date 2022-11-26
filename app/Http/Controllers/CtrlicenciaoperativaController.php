<?php

namespace App\Http\Controllers;

use PDF;
use Flash;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ctrlicenciaoperativa;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AppBaseController;
use App\DataTables\CtrlicenciaoperativaDataTable;
use App\Repositories\CtrlicenciaoperativaRepository;
use App\Http\Requests\CreateCtrlicenciaoperativaRequest;
use App\Http\Requests\UpdateCtrlicenciaoperativaRequest;

class CtrlicenciaoperativaController extends AppBaseController
{
    /** @var CtrlicenciaoperativaRepository $ctrlicenciaoperativaRepository*/
    private $ctrlicenciaoperativaRepository;

    public function __construct(CtrlicenciaoperativaRepository $ctrlicenciaoperativaRepo)
    {
        $this->ctrlicenciaoperativaRepository = $ctrlicenciaoperativaRepo;
    }

    /**
     * Display a listing of the Ctrlicenciaoperativa.
     */
    public function index(CtrlicenciaoperativaDataTable $ctrlicenciaoperativaDataTable)
    {
    return $ctrlicenciaoperativaDataTable->render('ctrlicenciaoperativas.index');
    }


    /**
     * Show the form for creating a new Ctrlicenciaoperativa.
     */
    public function create()
    {
        $vehiculos = Vehiculo::doesntHave('crtlicenciaoperativas')->get(['vehiculos.chapa', 'vehiculos.id'])->pluck('chapa', 'id');
        // $vehiculos = Vehiculo::pluck('chapa', 'id');
        return view('ctrlicenciaoperativas.create',['vehiculos' => $vehiculos]);
    }

    /**
     * Store a newly created Ctrlicenciaoperativa in storage.
     */
    public function store(CreateCtrlicenciaoperativaRequest $request)
    {
        $input = $request->all();

        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Licencia operativa agregada satisfactoriamente');

        return redirect(route('ctrlicenciaoperativas.index'));
    }

    /**
     * Display the specified Ctrlicenciaoperativa.
     */
    public function show($id)
    {
        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->find($id);

        if (empty($ctrlicenciaoperativa)) {
            Alert::info('Registro no encon+-
            trado', 'No existe la licencia operativa');

            return redirect(route('ctrlicenciaoperativas.index'));
        }

        return view('ctrlicenciaoperativas.show')->with('ctrlicenciaoperativa', $ctrlicenciaoperativa);
    }

    /**
     * Show the form for editing the specified Ctrlicenciaoperativa.
     */
    public function edit($id)
    {
        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->find($id);

        //obtengo vehiculo asociado a esta licencia operativa
        $vehiculo = Vehiculo::Where('id', $ctrlicenciaoperativa->vehiculo_id)->pluck('chapa', 'id');

        //obtengo vehiculos que no tienen licencia operativa
        $vehiculos = Vehiculo::doesntHave('crtlicenciaoperativas')->get(['vehiculos.chapa', 'vehiculos.id'])->pluck('chapa', 'id');

        //realizo la union para pasar estos datos a la vista de editar

        $allvehicles = $vehiculo->union($vehiculos);

        if (empty($ctrlicenciaoperativa)) {
            Alert::info('Registro no encontrado', 'No existe la licencia operativa');

            return redirect(route('ctrlicenciaoperativas.index'));
        }

        return view('ctrlicenciaoperativas.edit')->with(['ctrlicenciaoperativa' => $ctrlicenciaoperativa, 'vehiculos' => $allvehicles]);
    }

    /**
     * Update the specified Ctrlicenciaoperativa in storage.
     */
    public function update($id, UpdateCtrlicenciaoperativaRequest $request)
    {
        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->find($id);

        if (empty($ctrlicenciaoperativa)) {
            Alert::info('Registro no encontrado', 'No existe la licencia operativa');

            return redirect(route('ctrlicenciaoperativas.index'));
        }

        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Licencia operativa modificada satisfactoriamente');

        return redirect(route('ctrlicenciaoperativas.index'));
    }

    /**
     * Remove the specified Ctrlicenciaoperativa from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ctrlicenciaoperativa = $this->ctrlicenciaoperativaRepository->find($id);

        if (empty($ctrlicenciaoperativa)) {
            Alert::info('Registro no encontrado', 'No existe la licencia operativa');

            return redirect(route('ctrlicenciaoperativas.index'));
        }

        $this->ctrlicenciaoperativaRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Licencia operativa eliminada satisfactoriamente');

        return redirect(route('ctrlicenciaoperativas.index'));
    }

    public function guardar_pdf()    
    {
        $licenciass = Vehiculo::join('ctrlicenciaoperativas', 'ctrlicenciaoperativas.vehiculo_id', '=', 'vehiculos.id')
            ->whereRaw('DATEDIFF(ctrlicenciaoperativas.fechavenc,current_date)  <= 60')
            ->get(['ctrlicenciaoperativas.*', 'vehiculos.chapa']);    
                
        $data = [
            'date' => date('d-m-Y'),
            'licencias' => $licenciass
        ];
        
        $pdf = PDF::loadView('ctrlicenciaoperativas.generar_pdf', $data);
        return  $pdf->download('licenciassaved.pdf');
    }

    public function ver_pdf()    
    {
        $licencias = Ctrlicenciaoperativa::whereBetween(date('Y-m-d'), fechavenc->format('Y-m-d') <= 60);
        dd($licencias);
        $data = [
            'date' => date('d-m-Y'),
            'licencias' => $licencias
        ];
        
        $pdf = PDF::loadView('ctrlicenciaoperativas.generar_pdf', $data);
        return  $pdf->stream('licenciaseen.pdf');
    }


}
