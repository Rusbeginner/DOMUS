@extends('layouts.app')

@section('content')
<div class="container principal">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="row">
                <!--tarjeta 1-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-first rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Licencias operativas próximas a vencer ( {{ $licenciasoperativas }} )</h2>
                        </div>
                        <br>
                        <a href={{ route('ctrlicenciaoperativas.guardar_pdf') }} class="btn btn-md btn-danger">Guardar PDF</a>
                    </div>
                </div>
                <!--tarjeta 2-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-second rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Licencias de circulación próximas a vencer ( {{ $licenciascirc }} )</h2>
                        </div>
                        <br>
                        <a href={{ route('ctrlicenciacirc.guardar_pdf') }} class="btn btn-md btn-primary">Guardar PDF</a>

                    </div>
                </div>

                <!--tarjeta 3-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-third rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Licencias de conducción próximas a vencer ( {{ $licenciascond }} )</h2>
                        </div>
                        <br>
                        <a href={{ route('ctrlicenciacond.guardar_pdf') }} class="btn btn-md btn-success">Guardar PDF</a>

                    </div>
                </div>


            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <br />
            </div>

            <div class="row">
                <!--tarjeta 4-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-fourth rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Vehículos sin asignación de lubricantes en el mes({{ $vehsinlub }})</h2>

                        </div>
                        <br>
                        <a href={{ route('vehiculos.vehsinlubricantes') }} class="btn btn-md btn-danger">Guardar PDF</a>

                    </div>
                </div>
                <!--tarjeta 5-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-fifth rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Vehículos sin asignación de combustible en el mes({{ $vehsincom }})</h2>
                        </div>
                        {{-- <div class="card-body text-center">
                            <p class="card-text" style="font-family: sans-serif">Revise la implicación de este dato para su funcionamiento.</p>
                        </div> --}}
                        <br>
                        <a href={{ route('vehiculos.vehsincombustible') }} class="btn btn-md btn-primary">Guardar PDF</a>

                    </div>
                </div>
                <!--tarjeta 6-->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card-section border rounded p-3">
                        <div class="card-header-sixth rounded pb-5">
                            <h2 class="card-header-title text-white pt-3">Tarjetas magnéticas proximas a vencer({{ $tarjetasmag }})</h2>
                        </div>
                        <br>
                        <a href={{ route('tarjetasmag.vencer') }} class="btn btn-md btn-success">Guardar PDF</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>

@endsection
