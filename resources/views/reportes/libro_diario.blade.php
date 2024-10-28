<table class="table">
    <thead>
        <tr>
            <th>Cuenta</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asiento->asientoCuentas as $detalle)
            <tr>
                <td>{{ $detalle->cuenta->nombre }}</td>
                <td>{{ number_format($detalle->debe, 2) }}</td>
                <td>{{ number_format($detalle->haber, 2) }}</td>
                <td>{{ number_format($detalle->saldo, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

