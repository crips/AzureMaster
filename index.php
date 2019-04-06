<html>
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Bukabuku</title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
   <script>
		$( function() {
			$( "#datepicker" ).datepicker();
		} );
	</script>
</head>

 <body>
	 <div class="containermt-3">
		<div class="row">
			<div class="col-sm-12">
				 <input type="submit" class="btn btn-primary btnTambahData" data-toggle="modal" href="https://bukabuku.azurewebsites.net/add_new.php">Tambah Buku</input>
				 <input type="submit" class="btn btn-primary btnTambahData" data-toggle="modal" href="https://bukabuku.azurewebsites.net/kategoriku.php">Kategori Buku</input>
				 <input type="submit" class="btn btn-primary btnTambahData" data-toggle="modal" href="https://bukabuku.azurewebsites.net/penerbitan.php">Penerbit</input>

				 <h1>Katalog Buku</h1>
				 <table class="table table-stripped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Judul</th>
							<th scope="col">Deskripsi</th>
							<th scope="col">Kategori</th>
							<th scope="col">Harga</th>
							<th scope="col">Penerbit</th>
							<th scope="col">Tgl Rilis</th>
							<th scope="col">Tgl Ditambahkan</th>
						</tr>
					</thead>

					<tbody>
						<?php
							include "config.php";
							$conn = sqlsrv_connect($host, $connectionInfo);
							$sql_select = "SELECT buku.Id as ID, buku.JudulBuku as Judul, buku.Deskripsi as Deskripsi, kat.NamaKategori as Kategori, CAST(buku.Harga as INT) as Harga, pe.NamaPenerbit as Penerbit, buku.TglRilis as Rilis, buku.TglDitambahkan as Addedd FROM buku INNER JOIN Kategori kat ON buku.IdKategori = kat.IdKategori INNER JOIN Penerbit pe ON buku.IdPenerbit = pe.IdPenerbit";
							$stmt = sqlsrv_query($conn, $sql_select);
	
							do {
								while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
									?>
									<tr>
										<td><?= $row['ID'];?></td>
										<td><?= $row['Judul'];?></td>
										<td><?= $row['Deskripsi'];?></td>
										<td><?= $row['Kategori'];?></td>
										<td><?= $row['Harga'];?></td>
										<td><?= $row['Penerbit'];?></td>
										<td><?= $row['Rilis'];?></td>
										<td><?= $row['Addedd'];?></td>
									</tr>
									<?
								}
							}
							while (sqlsrv_next_result($stmt));
						?>
					</tbody>
				 </table>
			</div>
		</div>
	 </div>    
 </body>
 </html>