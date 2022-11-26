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
        <h3>Vehículos sin asignación de {{ $generic }} en el mes actual</h3>

        {{-- <img src="../../../public/img/logo_domus.png"> --}}
        <table caption="Listado">
            <thead>
                <tr>
                    <th>Chapa</th>
                    <th>Modelo</th>
                    <th>No.Medio básico</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->chapa }}</td>
                    <td>{{ $vehicle->modelo }}</td>
                    <td>{{ $vehicle->numediobasico }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
