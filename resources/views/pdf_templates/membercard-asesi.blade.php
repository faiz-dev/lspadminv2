<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page { margin: 0px; }
        body {
            margin: 0px;
            width: 300.75591pt;
            height: 175.1811pt;
            font-family: Arial, Helvetica, sans-serif;
        }
        #container {
            position: relative;
            width: 300pt;
        }
        #qr {
            position: absolute;
            right: 10px;
            top: 80px;
        }
        table {
            font-size: 0.8em;
            width: 100%;
        }
        td {
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div id="container">
        
        <center><img src="data:image/png;base64,{{ $banner }}" width="380pt" alt=""></center>
        <img src="data:image/png;base64,{{ $qr }}" width="50pt" alt="" id="qr">
        
        <table>
            <tr>
                <td colspan="2" align="center"><b>KARTU MEMBER</b></td>
            </tr>
            <tr>
                <td width="80" align="center">
                    <img src="data:image/png;base64,{{ $avatar }}" width="80" height="90" alt="">
                </td>
                <td>
                    <table width="100%">
                        <tr>
                            <td>Nama</td>
                            <td>{{$dataKartu->nama}}</td>
                        </tr>
                        <tr>
                            <td>No. Reg</td>
                            <td>{{$dataKartu->no_reg}}</td>
                        </tr>
                        <tr>
                            <td>Induk</td>
                            <td>{{$dataKartu->sekolah}}</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>{{$dataKartu->jurusan}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$dataKartu->email}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br><i style="font-size: 0.8em">Selalu bawa kartu ini ketika Uji Kompetensi. Berlaku s.d 03 Desember 2022</i></td>
            </tr>
        </table>
    
    </div>  
</body>
</html>