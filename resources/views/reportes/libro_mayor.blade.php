<table class="table">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @php $saldo = 0; @endphp
        @foreach($cuenta->movimientos as $movimiento)
            @php
                $saldo += $movimiento->debe - $movimiento->haber;
            @endphp
            <tr>
                <td>{{ $movimiento->asiento->fecha }}</td>
                <td>{{ $movimiento->asiento->descripcion }}</td>
                <td>{{ number_format($movimiento->debe, 2) }}</td>
                <td>{{ number_format($movimiento->haber, 2) }}</td>
                <td>{{ number_format($saldo, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
