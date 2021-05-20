<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table>
        @foreach ($collection as $it)
        <tr>
            <td> {{ $it->nama }} </td>
            <td> {{ $it->nik }} </td>
            <td> {{ $it->tempat_lahir }} </td>
            <td> {{ $it->tanggal_lahir }} </td>
            <td> {{ $it->jenis_kelamin }} </td>
            <td> {{ $it->domisili_alamat }} </td>
            <td> {{ $it->no_telp }} </td>
            <td> {{ $it->email }} </td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>