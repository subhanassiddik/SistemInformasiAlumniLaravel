<html>
<head>
	<title>Laporan Data Alumni</title>
</head>
<body>
	<style type="text/css">
		table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: auto;
        }
        th{
            height: 50px;
            text-align: center; 
        }
        td {
            padding: 5px;
            text-align: left;    
        }
        h3{
            margin-top: -15px;
        }
    </style>
	<center>
        <h3>LAPORAN DATA ALUMNI</h3>
        <h3>POLITEKNIK INFORMATIKA NASIONAL</h3>
        <h3>MAKASSAR</h3>
        <hr>
	</center>
	<table>
		<thead>
			<tr>
				<th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Ipk</th>
                <th>Lulus</th>
                <th>pekerjaan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($alumni as $al)
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{$al->name}}</td>
                <td>{{$al->nim}}</td>
                <td>{{$al->jenis_kelamin}}</td>
                <td>{{$al->email}}</td>
                <td>{{$al->telepon}}</td>
                <td>
                    @if($al->kerja == 1)
                    kerja
                    @else
                    belum kerja
                    @endif                    
                </td>
                <td>{{$al->jurusan_id != null?$al->jurusan->jurusan:''}}</td>
                <td>{{$al->angkatan}}</td>
                <td>{{$al->ipk}}</td>
                <td>{{$al->tahun_lulus}}</td>
                <td>{{ $al->pekerjaan_id !=null?$al->pekerjaan->name:''}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>