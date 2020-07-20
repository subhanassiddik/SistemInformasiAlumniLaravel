<html>
<head>
	<title>Laporan Data Alumni</title>
</head>
<body>
	<style type="text/css">
		table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
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
        <h3>LAPORAN DATA JURUSAN</h3>
        <h3>POLITEKNIK INFORMATIKA NASIONAL</h3>
        <h3>MAKASSAR</h3>
        <hr>
	</center>
	<table>
		<thead>
			<tr>
				<th>No</th>
                <th>Jurusan</th>
                <th>Prodi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($jurusan as $j)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $j->jurusan }}</td>
				<td>{{ $j->prodi->prodi }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>