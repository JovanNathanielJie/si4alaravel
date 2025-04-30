<h1>Fakultas</h1>

<table>
    <tr>
        <th>Nama</th>
        <th>Singkatan</th>
        <th>Dekan</th>
        <th>Wakil Dekan</th>
    </tr>
@foreach ($fakultas as $item)
    <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->singkatan }}</td>
        <td>{{ $item->dekan }}</td>
        <td>{{ $item->wakil_dekan }}</td>
        <td>{{ $item->fakultas->nama }}</td>
    </tr>
@endforeach
</table>