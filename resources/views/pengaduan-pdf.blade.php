<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<br/>
		<a href="{{ url('/cetak_pdf') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<br>

		<p>Sudah di Validasi: {{ $sudah[0] }}</p>
		<p>Belum di Validasi: {{ $belum[0] }}</p>
		<p>Pengaduan Hari ini: {{ $belum[0] }}</p>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama</th>
					<th>Tanggal Pengaduan</th>
					<th>Nik</th>
					<th>Isi Laporan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $p)
				<tr>
					<td>{{$p->id}}</td>
					<td>{{$p->nama_pengadu}}</td>
					<td>{{$p->tgl_pengaduan}}</td>
					<td>{{$p->nik}}</td>
					<td>{{$p->isi_laporan}}</td>
					<td>{{$p->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>
 
</body>
</html>