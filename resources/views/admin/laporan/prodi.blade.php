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
        <h3>LAPORAN DATA PRODI</h3>
        <h3>POLITEKNIK INFORMATIKA NASIONAL</h3>
        <h3>MAKASSAR</h3>
        <hr>
	</center>
	<table>
		<thead>
			<tr>
				<th>No</th>
                <th>Prodi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($prodi as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $p->prodi }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>