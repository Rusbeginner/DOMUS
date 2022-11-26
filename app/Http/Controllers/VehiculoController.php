<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon as Carbon;
use App\Models\Chofer;
use App\Models\Tipoequipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\VehiculoDataTable;
use App\Repositories\VehiculoRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;

class VehiculoController extends AppBaseController
{
    /** @var VehiculoRepository $vehiculoRepository*/
    private $vehiculoRepository;

    public function __construct(VehiculoRepository $vehiculoRepo)
    {
        $this->vehiculoRepository = $vehiculoRepo;
    }

    /**
     * Display a listing of the Vehiculo.
     */
    public function index(VehiculoDataTable $vehiculoDataTable)
    {
    return $vehiculoDataTable->render('vehiculos.index');
    }


    /**
     * Show the form for creating a new Vehiculo.
     */
    public function create()
    {
        $chofers = Chofer::doesntHave('vehiculo')->get([DB::raw('CONCAT(chofers.nombre, " ", chofers.apellidos) AS nombre'), 'chofers.id'])->pluck('nombre', 'id');
        $tiposequipos = Tipoequipo::pluck('tipo', 'id');

        return view('vehiculos.create', ['chofers' => $chofers, 'tiposequipos' => $tiposequipos]);
    }

    /**
     * Store a newly created Vehiculo in storage.
     */
    public function store(CreateVehiculoRequest $request)
    {
        $input = $request->all();

        $vehiculo = $this->vehiculoRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Vehículo agregado satisfactoriamente');

        return redirect(route('vehiculos.index'));
    }

    /**
     * Display the specified Vehiculo.
     */
    public function show($id)
    {
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            Flash::error('Vehículo no encontrado');

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.show')->with('vehiculo', $vehiculo);
    }

    /**
     * Show the form for editing the specified Vehiculo.
     */
    public function edit($id)
    {
        $vehiculo = $this->vehiculoRepository->find($id);

        //obtengo chofer asociado a este vehiculo
        $chofer = Chofer::Where('id', $vehiculo->chofer_id)->pluck('nombre', 'id');

        //obtengo choferes que aun no estan asociados a un vehiculo
        $chofers = Chofer::doesntHave('vehiculo')->get([DB::raw('CONCAT(chofers.nombre, " ", chofers.apellidos) AS nombre'), 'chofers.id'])->pluck('nombre', 'id');

        //realizo la union para pasar estos choferes a la vista de editar

        $allchofers = $chofer->union($chofers);

        $chofers = Chofer::pluck('nombre', 'id');
        
        $tiposequipos = Tipoequipo::pluck('tipo', 'id');

        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            Flash::error('Vehículo no encontrado');

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.edit')->with(['vehiculo' => $vehiculo,'chofers' => $allchofers, 'tiposequipos' => $tiposequipos]);
    }

    /**
     * Update the specified Vehiculo in storage.
     */
    public function update($id, UpdateVehiculoRequest $request)
    {
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            Flash::error('Vehículo no encontrado');

            return redirect(route('vehiculos.index'));
        }

        $vehiculo = $this->vehiculoRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Vehículo modificado satisfactoriamente');

        return redirect(route('vehiculos.index'));
    }

    /**
     * Remove the specified Vehiculo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            Flash::error('Vehículo no encontrado');

            return redirect(route('vehiculos.index'));
        }

        $this->vehiculoRepository->delete($id);

        Flash::success('Vehiculo eliminado satisfactoriamente.');

        return redirect(route('vehiculos.index'));
    }

    //Reportes

    public function obtenervehsinlubricantes()
    {
        //obtengo fecha inicial y final del mes actual
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        
        //obtengo asignaciones de lubricantes en el mes actual
        $dataAsignLub = DB::table('aslubricantes as alc')->select('alc.vehiculo_id')->whereBetween('fechaini', [$dateS, $dateE])
                                                                        ->whereBetween('fechafin', [$dateS, $dateE])->get()->pluck('vehiculo_id');

        //obtengo vehiculos sin asignacion de lubricantes
        $datavehicles = DB::table('vehiculos')->select('*')->whereNotIn('id',$dataAsignLub)->get();

        //obtener nombre del mes actual
        $current_date = \Carbon\Carbon::now();
        $date = $current_date->formatLocalized('%B')."/".$current_date->year;

        $data = [
            'date' => $date,
            'vehicles' => $datavehicles,
            'generic' => 'lubricantes'
        ];
        
        $pdf = PDF::loadView('vehiculos.generar_pdf', $data);
        return  $pdf->download('vehsinlub.pdf');
    }

    public function obtenervehsincombustible()
    {
        //obtengo fecha inicial y final del mes actual
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        
        //obtengo asignaciones de combustible en el mes actual
        $dataAsignLCom = DB::table('ctrlcombustibles as ctc')->select('ctc.vehiculo_id')->whereBetween('fechaini', [$dateS, $dateE])
                                                                        ->whereBetween('fechafin', [$dateS, $dateE])->get()->pluck('vehiculo_id');

        //obtengo vehiculos sin asignacion de combustible en el mes actual
        $datavehsincom = DB::table('vehiculos')->select('*')->whereNotIn('id',$dataAsignLCom)->get(); 

        //obtener nombre del mes actual
        $current_date = \Carbon\Carbon::now();
        $date = $current_date->formatLocalized('%B')."/".$current_date->year;

        $data = [
            'date' => $date,
            'vehicles' => $datavehsincom,
            'generic' => 'combustible'
        ];
        
        $pdf = PDF::loadView('vehiculos.generar_pdf', $data);
        return  $pdf->download('vehsincomb.pdf');
    }
}
