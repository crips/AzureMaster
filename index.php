<!doctype html>
<html lang="en">

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
   <div class="container mt-3">
      <h1 class="center">Register Here</h1>

      <form action="index.php" method="post">
         <div class="form-group">
            <label for="JudulBuku">Judul</label>
            <input type="text" name="JudulBuku" class="form-control">
         </div>
         <div class="form-group">
            <label for="Deskripsi">Deskripsi</label>
            <input type="text" name="Deskripsi" class="form-control">
         </div>
         <div class="form-group">
            <label for="Kategori">Kategori</label>
			<select>
				<option value="" disabled="disabled" selected="select">Pilih Kategori</option>
				<option value="1">Elexmedia Komputindo</option>
				<option value="2">Gagasmedia</option>
				<option value="3">Mizan</option>
				<option value="4">Bukune</option>
			</select>
         </div>
         <div class="form-group">
            <label for="Harga">Harga</label>
            <input type="text" name="Harga" class="form-control">
         </div>
         <div class="form-group">
            <label for="Penerbit">Penerbit</label>
            <input type="text" name="Penerbit" class="form-control">
         </div>
         <div class="form-group">
            <label for="TglRilis">Tanggal Rilis</label>
            <input type="text" id="datepicker" class="form-control">
         </div>
         <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-md"/>
		 <input type="submit" name="load_data" value="Lihat Data" class="btn btn-primary btn-md"/>
      </form>
      
      <?php
			$host = "tcp:bukabuku.database.windows.net, 1433";
	$user = "mafrizal";
    $pass = "Timpakul2016+";
    $db = "bukabuku";
    try {
		$con = new PDO("sqlsrv:Server = $host; Database = $db", $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
		echo "Failed : " . $e;
    }
	
	$connectionInfo = array("UID" => "mafrizal@bukabuku", "pwd" => "Timpakul2016+", "Database" => "bukabuku", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:bukabuku.database.windows.net, 1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);

      if (isset($_POST['load_data'])) {
            try {
                $sql_select = "SELECT buku.Id as ID, buku.JudulBuku as Judul, buku.Deskripsi as Deskripsi, kat.NamaKategori as Kategori, buku.Harga as Harga, pe.NamaPenerbit as Penerbit, buku.TglRilis as Rilis, buku.TglDitambahkan as Addedd FROM buku INNER JOIN Kategori kat ON buku.IdKategori = kat.IdKategori INNER JOIN Penerbit pe ON buku.IdPenerbit = pe.IdPenerbit";
                $stmt = $conn->query($sql_select);
                $registrants = $stmt->fetchAll(); 
                if(count($registrants) > 0) {
                    echo "<h2>Buku yang tersedia:</h2>";
                    echo "<table>";
                    echo "<tr><th>Judul</th>";
                    echo "<th>Deskripsi</th>";
                    echo "<th>Kategori</th>";
                    echo "<th>Harga</th>";
                    echo "<th>Penerbit</th>";
                    echo "<th>Tgl Rilis</th>";
                    echo "<th>Tgl Ditambahkan</th></tr>";
                    foreach($registrants as $registrant) {
                        echo "<tr><td>".$registrant['Judul']."</td>";
                        echo "<td>".$registrant['Deskripsi']."</td>";
                        echo "<td>".$registrant['Kategori']."</td>";
                        echo "<td>".$registrant['Harga']."</td></tr>";
                        echo "<td>".$registrant['Penerbit']."</td></tr>";
                        echo "<td>".$registrant['Rilis']."</td></tr>";
                        echo "<td>".$registrant['Addedd']."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h3>Tidak ada buku di data tersimpan</h3>";
                }
            } catch(Exception $e) {
                echo "Failed: " . $e;
            }
      }
      ?>

      <table class="table table-responsive mt-3">
         <thead>
            <tr>
               <th>Judul</th>
               <th>Deskripsi</th>
               <th>Harga</th>
               <th>Kategori</th>
               <th>Penerbit</th>
               <th>Tahun Rilis</th>
               <th>Tahun Ditambahkan</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
      </table>
   </div>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>

</html>
