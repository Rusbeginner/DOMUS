<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Chofer;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\DataTables\CtrlicenciaconducDataTable;
use App\Repositories\CtrlicenciaconducRepository;
use App\Http\Requests\CreateCtrlicenciaconducRequest;
use App\Http\Requests\UpdateCtrlicenciaconducRequest;
use RealRashid\SweetAlert\Facades\Alert;


class CtrlicenciaconducController extends AppBaseController
{
    /** @var CtrlicenciaconducRepository $ctrlicenciaconducRepository*/
    private $ctrlicenciaconducRepository;

    public function __construct(CtrlicenciaconducRepository $ctrlicenciaconducRepo)
    {
        $this->ctrlicenciaconducRepository = $ctrlicenciaconducRepo;
    }

    /**
     * Display a listing of the Ctrlicenciaconduc.
     */
    public function index(CtrlicenciaconducDataTable $ctrlicenciaconducDataTable)
    {
    return $ctrlicenciaconducDataTable->render('ctrlicenciaconducs.index');
    }


    /**
     * Show the form for creating a new Ctrlicenciaconduc.
     */
    public function create()
    {
        $choferes = Chofer::doesntHave('licenciaconduc')->get([DB::raw('CONCAT(chofers.nombre, " ", chofers.apellidos) AS nombre'), 'chofers.id'])->pluck('nombre', 'id');

        return view('ctrlicenciaconducs.create', ['choferes' => $choferes]);
    }

    /**
     * Store a newly created Ctrlicenciaconduc in storage.
     */
    public function store(CreateCtrlicenciaconducRequest $request)
    {
        $input = $request->all();

        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->create($input);

        Alert::success('Operación realizada con éxito', 'Licencia de conducción almacenada satisfactoriamente');

        return redirect(route('ctrlicenciaconducs.index'));
    }

    /**
     * Display the specified Ctrlicenciaconduc.
     */
    public function show($id)
    {
        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->find($id);

        if (empty($ctrlicenciaconduc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia');

            return redirect(route('ctrlicenciaconducs.index'));
        }

        return view('ctrlicenciaconducs.show')->with('ctrlicenciaconduc', $ctrlicenciaconduc);
    }

    /**
     * Show the form for editing the specified Ctrlicenciaconduc.
     */
    public function edit($id)
    {
        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->find($id);
        //obtebgo chofer asociado a esta licencia
        $chofer = Chofer::Where('id', $ctrlicenciaconduc->chofer_id)->pluck('nombre', 'id');

        //obtengo choferes que aun no tienen licencia de conduccion
        $choferes = Chofer::doesntHave('licenciaconduc')->get([DB::raw('CONCAT(chofers.nombre, " ", chofers.apellidos) AS nombre'), 'chofers.id'])->pluck('nombre', 'id');

        //realizo la union para pasar estos choferes a la vista de editar
        $allchoferes = $chofer->union($choferes);

        $choferes = Chofer::pluck('nombre', 'id');

        if (empty($ctrlicenciaconduc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia');

            return redirect(route('ctrlicenciaconducs.index'));
        }

        return view('ctrlicenciaconducs.edit')->with(['ctrlicenciaconduc' => $ctrlicenciaconduc, 'choferes' => $allchoferes]);
    }

    /**
     * Update the specified Ctrlicenciaconduc in storage.
     */
    public function update($id, UpdateCtrlicenciaconducRequest $request)
    {
        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->find($id);

        if (empty($ctrlicenciaconduc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia');

            return redirect(route('ctrlicenciaconducs.index'));
        }

        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->update($request->all(), $id);

        Alert::success('Operación realizada con éxito', 'Licencia de conducción modificada satisfactoriamente');

        return redirect(route('ctrlicenciaconducs.index'));
    }

    /**
     * Remove the specified Ctrlicenciaconduc from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ctrlicenciaconduc = $this->ctrlicenciaconducRepository->find($id);

        if (empty($ctrlicenciaconduc)) {
            Alert::info('Registro no encontrado', 'No existe la licencia');

            return redirect(route('ctrlicenciaconducs.index'));
        }

        $this->ctrlicenciaconducRepository->delete($id);

        Alert::success('Operación realizada con éxito', 'Licencia de conducción eliminada satisfactoriamente');

        return redirect(route('ctrlicenciaconducs.index'));
    }

    public function guardar_pdf()    
    {
        $licenciass = Chofer::join('ctrlicenciaconducs', 'ctrlicenciaconducs.chofer_id', '=', 'chofers.id')
            ->whereRaw('DATEDIFF(ctrlicenciaconducs.fechavenc,current_date)  <= 60')
            ->get(['ctrlicenciaconducs.*', DB::raw('CONCAT(chofers.nombre, " ", chofers.apellidos) AS nombre')]);    
                
        $data = [
            'date' => date('d-m-Y'),
            'licencias' => $licenciass
        ];
        
        $pdf = PDF::loadView('ctrlicenciaconducs.generar_pdf', $data);
        return  $pdf->download('licenciascondsaved.pdf');
    }
}
