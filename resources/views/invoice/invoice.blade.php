<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>invoice order receipt - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
    				<!-- BEGIN INVOICE -->
					<div class="col-xs-12">
						<div class="grid invoice">
							<div class="grid-body">
								<div class="invoice-title">
									<div class="row">
										<div class="col-xs-12">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-xs-12">
											<h2>invoice<br>
											<span class="small">order #{{$instansi->id}}</span></h2>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Penerima : </strong><br>
											Nama Pendaftar : {{$instansi->nama_pendaftar}}<br>
											Nama Instansi : {{$instansi->nama_instansi}}<br>
											Alamat Instansi : {{$instansi->alamat_instansi}}<br>
											Email Instansi : {{$instansi->email_instansi}}<br>
										</address>
									</div>
									<div class="col-xs-6 text-right">
										
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Metode Pembayaran:</strong><br>
											{{$instansi->metode_pembayaran}}<br>
											#{{$instansi->kode_pembayaran}}<br>
										</address>
									</div>
									<div class="col-xs-6 text-right">
										<address>
											<strong>Tanggal Pembayaran:</strong><br>
											{{ date("d-m-Y", strtotime($instansi->updated_at))}}
										</address>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Detail Pendaftaran</h3>
										<table class="table table-striped">
											<thead>
												<tr class="line">
													<td><strong>No</strong></td>
													<td class="text-center"><strong>NAMA</strong></td>
													<td class="text-center"><strong>JUMLAH</strong></td>
													<td class="text-right"><strong>SATUAN</strong></td>
													<td class="text-right"><strong>BIAYA PER SATUAN</strong></td>
													<td class="text-right"><strong>SUBTOTAL</strong></td>
												</tr>
											</thead>
											<tbody>
												@foreach ($siswa as $key=>$item)
												<tr>
													<td>{{$key+1}}</td>
													<td><strong>{{$item->nama_siswa}}</strong><br>{{$item->nomor_induk}}</td>
													<td class="text-center">{{$instansi->jumlah_pelayanan}}</td>
													<td class="text-center">{{$instansi->satuan_waktu}}</td>
													<td class="text-right">Rp. {{$instansi->biaya}}</td>
													<td class="text-right">Rp. {{$instansi->biaya * $instansi->jumlah_pelayanan}}</td>
												</tr>
												@endforeach
												<tr>
													<td colspan="4">
													</td><td class="text-right"><strong>Total</strong></td>
													<td class="text-right"><strong>Rp. {{$instansi->total_biaya_pelayanan}}</strong></td>
												</tr>
											</tbody>
										</table>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-12 text-right identity">
										<p>Designer identity<br><strong>Jeffrey Williams</strong></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END INVOICE -->
				</div>
</div>

<style type="text/css">
body{margin-top:20px;
background:#eee;
}

.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #ddd;
}

.invoice .table tr.line {
	border-bottom: 1px solid #ccc;
}

.invoice .table td {
	border: none;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;
}


.grid {
    position: relative;
	width: 100%;
	background: #fff;
	color: #666666;
	border-radius: 2px;
	margin-bottom: 25px;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}

</style>

<script type="text/javascript">

</script>
</body>
</html>