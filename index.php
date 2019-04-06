<html>
 <head>
 <Title>Bukabuku</Title>
 <style type="text/css">
 	body { background-color: #fff; border-top: solid 10px #000;
 	    color: #333; font-size: .85em; margin: 20; padding: 20;
 	    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 	}
 	h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
 	h1 { font-size: 2em; }
 	h2 { font-size: 1.75em; }
 	h3 { font-size: 1.2em; }
 	table { margin-top: 0.75em; }
 	th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
 	td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
 </style>
 </head>

 <body>
 <form method="post" action="index.php" enctype="multipart/form-data" >
       Judul  <input type="text" name="name" id="name"/></br></br>
       Deskripsi <input type="text" name="email" id="email"/></br></br>
       Kategori <input type="text" name="job" id="job"/></br></br>
       Harga <input type="text" name="job" id="job"/></br></br>
       Penerbit <input type="text" name="job" id="job"/></br></br>
       Tanggal Rilis <input type="text" name="job" id="job"/></br></br>
       <input type="submit" name="submit" value="Submit" />
       <input type="submit" name="load_data" value="Load Data" />
 </form>

	<?php
    include "config.php";

	$conn = sqlsrv_connect($host, $connectionInfo);
	$sql_select = "SELECT buku.Id as ID, buku.JudulBuku as Judul, buku.Deskripsi as Deskripsi, kat.NamaKategori as Kategori, buku.Harga as Harga, pe.NamaPenerbit as Penerbit, buku.TglRilis as Rilis, buku.TglDitambahkan as Addedd FROM buku INNER JOIN Kategori kat ON buku.IdKategori = kat.IdKategori INNER JOIN Penerbit pe ON buku.IdPenerbit = pe.IdPenerbit";
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
    
 </body>
 </html>