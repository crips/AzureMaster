<html>
    <head>
        <Title>Home - Buka Buku</Title>
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
    <?php
		// PHP Data Objects(PDO) Sample Code:
		try {
			$conn = new PDO("sqlsrv:server = tcp:bukabuku.database.windows.net,1433; Database = bukabuku", "mafrizal", "Timpakul2016+");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			print("Error connecting to SQL Server.");
			die(print_r($e));
		}

		// SQL Server Extension Sample Code:
		$connectionInfo = array("UID" => "mafrizal@bukabuku", "pwd" => "Timpakul2016+", "Database" => "bukabuku", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
		$serverName = "tcp:bukabuku.database.windows.net,1433";
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
        </body>
    </html>
?>