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
 <h1>Register here!</h1>
 <p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
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
    include "config.php"

    if (isset($_POST['submit'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $job = $_POST['job'];
            $date = date("Y-m-d");

            $sql_insert = "INSERT INTO Registration (name, email, job, date) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->bindValue(4, $date);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "<h3>Your're registered!</h3>";
    } else if (isset($_POST['load_data'])) {
        try {
            $sql_select = "SELECT buku.Id as ID, buku.JudulBuku as Judul, buku.Deskripsi as Deskripsi, kat.NamaKategori as Kategori, buku.Harga as Harga, pe.NamaPenerbit as Penerbit, buku.TglRilis as Rilis, buku.TglDitambahkan as Addedd FROM buku INNER JOIN Kategori kat ON buku.IdKategori = kat.IdKategori INNER JOIN Penerbit pe ON buku.IdPenerbit = pe.IdPenerbit";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>Daftar Buku:</h2>";
                echo "<table>";
                echo "<tr><th>ID</th>";
                echo "<tr><th>Judul</th>";
                echo "<th>Deskripsi</th>";
                echo "<th>Kategori</th>";
                echo "<th>Harga</th>";
                echo "<th>Penerbit</th>";
                echo "<th>Tgl Rilis</th>";                
                echo "<th>Tgl Ditambahkan</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['ID']."</td>";
                    echo "<td>".$registrant['JudulBuku']."</td>";
                    echo "<td>".$registrant['Deskripsi']."</td>";
                    echo "<td>".$registrant['Kategori']."</td>";
                    echo "<td>".$registrant['Harga']."</td>";
                    echo "<td>".$registrant['Penerbit']."</td>";
                    echo "<td>".$registrant['Rilis']."</td>";
                    echo "<td>".$registrant['Addedd']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h3>No one is currently registered.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </body>
 </html>