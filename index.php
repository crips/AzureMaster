<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <title>Submission Azure</title>
</head>

<body>
   <div class="container mt-3">
      <h1 class="center">Register Here</h1>

      <form action="index.php" method="post">
         <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control">
         </div>
         <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" name="email" class="form-control">
         </div>
         <div class="form-group">
            <label for="job">Your Job</label>
            <input type="text" name="job" class="form-control">
         </div>
         <input type="submit" name="simpan" class="btn btn-primary btn-md">
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
      if (isset($_POST['simpan'])) {
         try {
            $Judul = $_POST['JudulBuku'];
            $Deskripsi = $_POST['Deskripsi'];
            $IdKategori = $_POST['IdKategori'];
			$Harga = $POST['Harga']
			$IdPenerbit = $POST['IdPenerbit']
			$TglRilis = $POST['TglRilis']
            $query = "INSERT INTO Buku (JudulBuku, Deskripsi, IdKategori, Harga, IdPenerbit, TglRilis) VALUES ('$Judul', '$Deskripsi', '$IdKategori', '$Harga', '$IdPenerbit', '$TglRilis')";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $Judul);
            $stmt->bindValue(2, $Deskripsi);
            $stmt->bindValue(3, $IdKategori);
            $stmt->bindValue(4, $Harga);
            $stmt->bindValue(5, $IdPenerbit);
            $stmt->bindValue(6, $TglRilis);
            $stmt->execute();
         } catch (Exception $e) {
            echo "Failed" . $e;
         }
         echo "<h3>Your're registered!</h3>";
      } else if (isset($_POST['load_data'])) {
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
   <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   -->
</body>

</html>