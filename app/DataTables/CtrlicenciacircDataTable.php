<?php

namespace App\DataTables;

use App\Models\Ctrlicenciacirc;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CtrlicenciacircDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'ctrlicenciacircs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ctrlicenciacirc $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ctrlicenciacirc $model)
    {
        return $model->newQuery()->with(['vehiculo']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => 'Acciones','width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                'language' => [
                    'lengthMenu' => 'Mostrar',
                    'info' => 'Mostrando la página _PAGE_ de _PAGES_',
                    'search' => 'Buscar',
                    'zeroRecords' => 'No se encuentra ningún resultado, pruebe a cambiar el filtro',
                    'processing' => 'Procesando la información....',
                    'infoFiltered' =>   '(filtrado de _MAX_ registros totales)',
                    'infoEmpty' => 'Mostrando 0 de 0 registros',
                    'paginate' => [
                        'previous' => 'Anterior',
                        'next' => 'Siguiente'
                    ]
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'vehiculo_id' => new \Yajra\DataTables\Html\Column([
                'title' => 'Vehículo(chapa)',
                'data' => 'vehiculo.chapa',
                'name' => 'vehiculo.chapa'
            ]),
            'nocomprobante' => new \Yajra\DataTables\Html\Column([
                'title' => 'No. Comprobante',
                'data' => 'nocomprobante',
                'name' => 'nocomprobante'
            ]),
            'fechaemision' => new \Yajra\DataTables\Html\Column([
                'title' => 'Fecha de emisión',
                'data' => 'fechaemision',
                'name' => 'fechaemision'
            ]),
            'fechavenc' => new \Yajra\DataTables\Html\Column([
                'title' => 'Fecha de vencimiento',
                'data' => 'fechavenc',
                'name' => 'fechavenc'
            ])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ctrlicenciacircs_datatable_' . time();
    }
}
