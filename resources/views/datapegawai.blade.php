<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table" border="1">
        <tr>
            <td>Nama</td>
            <td>Jabatan</td>
            <td>Password</td>
            <td>Instalasi</td>
            <td>Atasan 1</td>
            <td>Atasan 2</td>
            <td>ID</td>
        </tr>
        @foreach ($all as $d)
        <tr>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->jabatan }}</td>
            <td>{{ $d->password }}</td>
            <td>{{ $d->instalasi }}</td>
            <td>{{ $d->atasan1 }}</td>
            <td>{{ $d->atasan2 }}</td>
            <td>{{ $d->api_id }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>