<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Combustible;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\DataTables\TarjetamagneticaDataTable;
use App\Repositories\TarjetamagneticaRepository;
use App\Http\Requests\CreateTarjetamagneticaRequest;
use App\Http\Requests\UpdateTarjetamagneticaRequest;

class TarjetamagneticaController extends AppBaseController
{
    /** @var TarjetamagneticaRepository $tarjetamagneticaRepository*/
    private $tarjetamagneticaRepository;

    public function __construct(TarjetamagneticaRepository $tarjetamagneticaRepo)
    {
        $this->tarjetamagneticaRepository = $tarjetamagneticaRepo;
    }

    /**
     * Display a listing of the Tarjetamagnetica.
     */
    public function index(TarjetamagneticaDataTable $tarjetamagneticaDataTable)
    {
        return $tarjetamagneticaDataTable->render('tarjetamagneticas.index');
    }


    /**
     * Show the form for creating a new Tarjetamagnetica.
     */
    public function create()
    {
        $combustibles = Combustible::pluck('nombre', 'id');
        //dd($combustibles);

        return view('tarjetamagneticas.create', ['combustibles' => $combustibles]);
    }

    /**
     * Store a newly created Tarjetamagnetica in storage.
     */
    public function store(CreateTarjetamagneticaRequest $request)
    {
        $input = $request->all();

        $tarjetamagnetica = $this->tarjetamagneticaRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Tarjeta agregada satisfactoriamente');

        return redirect(route('tarjetamagneticas.index'));
    }

    /**
     * Display the specified Tarjetamagnetica.
     */
    public function show($id)
    {
        $tarjetamagnetica = $this->tarjetamagneticaRepository->find($id);

        if (empty($tarjetamagnetica)) {
            Alert::info('Registro no encontrado', 'No existe la tarjeta');

            return redirect(route('tarjetamagneticas.index'));
        }

        return view('tarjetamagneticas.show')->with('tarjetamagnetica', $tarjetamagnetica);
    }

    /**
     * Show the form for editing the specified Tarjetamagnetica.
     */
    public function edit($id)
    {
        $combustibles = Combustible::pluck('nombre','id');

        $tarjetamagnetica = $this->tarjetamagneticaRepository->find($id);

        if (empty($tarjetamagnetica)) {
            Alert::info('Registro no encontrado', 'No existe la tarjeta');

            return redirect(route('tarjetamagneticas.index'));
        }

        return view('tarjetamagneticas.edit')->with(['tarjetamagnetica' => $tarjetamagnetica, 'combustibles' => $combustibles]);
    }

    /**
     * Update the specified Tarjetamagnetica in storage.
     */
    public function update($id, UpdateTarjetamagneticaRequest $request)
    {
        $tarjetamagnetica = $this->tarjetamagneticaRepository->find($id);

        if (empty($tarjetamagnetica)) {
            Alert::info('Registro no encontrado', 'No existe la tarjeta');

            return redirect(route('tarjetamagneticas.index'));
        }

        $tarjetamagnetica = $this->tarjetamagneticaRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Tarjeta modificada satisfactoriamente');

        return redirect(route('tarjetamagneticas.index'));
    }

    /**
     * Remove the specified Tarjetamagnetica from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tarjetamagnetica = $this->tarjetamagneticaRepository->find($id);

        if (empty($tarjetamagnetica)) {
            Alert::info('Registro no encontrado', 'No existe la tarjeta');

            return redirect(route('tarjetamagneticas.index'));
        }

        $this->tarjetamagneticaRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Tarjeta eliminada satisfactoriamente');

        return redirect(route('tarjetamagneticas.index'));
    }

    public function obtenertarjavencer()
    {
        //obtener tarjetas magneticas proximas a vencer
        $dataTarj = DB::table('tarjetamagneticas as tm')->select('tm.*')->whereRaw('DATEDIFF(fechavenc,current_date)  <= 60')
                            ->get();


        $data = [
            'date' => date('d-m-Y'),
            'tarjetas' => $dataTarj
        ];   
        
        $pdf = PDF::loadView('tarjetamagneticas.generar_pdf', $data);
        return  $pdf->download('tarjetas.pdf');
    }
}
