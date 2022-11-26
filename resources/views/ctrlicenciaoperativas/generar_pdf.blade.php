<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 3px solid;

        }

        th,
        tr,
        td {
            border: 1px solid #000;
            width: 150px;
            height: 45px;
            vertical-align: middle;
            text-align: center;
        }

        th {
            color: #fff;
            background-color: dodgerblue;
        }

        tr:nth-child(odd) td {
            background-color: #eee;
        }

        .contenedor {
            text-align: center;
        }

    </style>

</head>

<body>
    <div class="contenedor">
        <p style="text-align: right;">Moa, {{ $date }}</p>
        <p>EMPRESA CONSTRUCTORA DEL PODER POPULAR
            UNIDAD EMPRESARIAL DE BASE MOA</p>
        <h3>Licencias operativas próximas a vencer</h3>

        {{-- <img src="../../../public/img/logo_domus.png"> --}}
        <table caption="Listado">
            <thead>
                <tr>
                    <th>Vehículo(chapa)</th>
                    <th>No. Comprobante</th>
                    <th>Fecha de vencimiento</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($licencias as $licencia)
                <tr>
                    <td>{{ $licencia->chapa }}</td>
                    <td>{{ $licencia->nocomprobante }}</td>
                    <td>{{ Carbon\Carbon::parse($licencia->fechavenc)->format('d-m-Y') }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
