<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ctrlicenciaoperativa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //obtener lic operativas proximas a vencer
        $dataLicOP = DB::table('ctrlicenciaoperativas as lo')->select('lo.*')->whereRaw('DATEDIFF(fechavenc,current_date)  <= 60')
                            ->get()->count();


        //obtener licencias operativas proximas a vencer                            
        $dataLicCirc = DB::table('ctrlicenciacircs as lc')->select('lc.*')->whereRaw('DATEDIFF(fechavenc,current_date)  <= 60')
                            ->get()->count();   
                            
        //obtener licencias de conduccion proximas a vencer                            
                            
        $dataLicCond = DB::table('ctrlicenciaconducs as lco')->select('lco.*')->whereRaw('DATEDIFF(fechavenc,current_date)  <= 60')
                            ->get()->count();      
                            
        
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        
        //obtengo asignaciones de lubricantes en el mes actual
        $dataAsignLub = DB::table('aslubricantes as alc')->select('alc.vehiculo_id')->whereBetween('fechaini', [$dateS, $dateE])
                                                                        ->whereBetween('fechafin', [$dateS, $dateE])->get()->pluck('vehiculo_id');

        //obtengo vehiculos sin asignacion de lubricantes
        $datavehsinlub = DB::table('vehiculos')->select('*')->whereNotIn('id',$dataAsignLub)->get()->count();

        //obtengo asignaciones de combustible en el mes actual
        $dataAsignLCom = DB::table('ctrlcombustibles as ctc')->select('ctc.vehiculo_id')->whereBetween('fechaini', [$dateS, $dateE])
                                                                        ->whereBetween('fechafin', [$dateS, $dateE])->get()->pluck('vehiculo_id');

        //obtengo vehiculos sin asignacion de combustible en el mes actual
        $datavehsincom = DB::table('vehiculos')->select('*')->whereNotIn('id',$dataAsignLCom)->get()->count();        
        
        //obtener tarjetas magneticas proximas a vencer
        $dataTarj = DB::table('tarjetamagneticas as tm')->select('tm.*')->whereRaw('DATEDIFF(fechavenc,current_date)  <= 60')
                            ->get()->count();
        

        return view('home',['fechaini' => $dateS, 'fechafin' => $dateE, 'licenciasoperativas' => $dataLicOP, 'licenciascirc' => $dataLicCirc, 'licenciascond' => $dataLicCond, 
                            'vehsinlub' => $datavehsinlub, 'vehsincom' => $datavehsincom, 'tarjetasmag' => $dataTarj]);
    }
}
