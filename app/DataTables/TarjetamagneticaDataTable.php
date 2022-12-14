<?php

namespace App\DataTables;

use App\Models\Tarjetamagnetica;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TarjetamagneticaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'tarjetamagneticas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tarjetamagnetica $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tarjetamagnetica $model)
    {
        return $model->newQuery()->with(['combustible']);
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
//                        ['extend' => 'pdf', 'className' => 'btn btn-default btn-sm no-corner',],
  //                      ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                'language' => [
                    'lengthMenu' => 'Mostrar',
                    'info' => 'Mostrando la p??gina _PAGE_ de _PAGES_',
                    'search' => 'Buscar',
                    'zeroRecords' => 'No se encuentra ning??n resultado, pruebe a cambiar el filtro',
                    'infoEmpty' => 'Mostrando 0 de 0 registros',
                    'processing' => 'Procesando la informaci??n....',
                    'infoFiltered' =>   '(filtrado de _MAX_ registros totales)',
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
            'notarjeta' => new \Yajra\DataTables\Html\Column([
                'title' => 'Tarjeta',
                'data' => 'notarjeta',
                'name' => 'notarjeta'
            ]),
            'fechavenc' => new \Yajra\DataTables\Html\Column([
                'title' => 'Fecha de vencimiento',
                'data' => 'fechavenc',
                'name' => 'fechavenc'
            ]),
            'combustible_id' => new \Yajra\DataTables\Html\Column([
                'title' => 'Combustible',
                'data' => 'combustible.nombre',
                'name' => 'combustible.nombre'
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
        return 'tarjetamagneticas_datatable_' . time();
    }
}
