<html>
<head>
    <title>CRUD PHP - SQL Server</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>  
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" data-target="#exampleModal" data-zurl="">
					Tambah Barang
				</button>

                <h1>Data Barang</h1>
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
										<td><? echo $row['ID'];?></td>
										<td><? echo $row['Judul'];?></td>
										<td><? echo $row['Deskripsi'];?></td>
										<td><? echo $row['Kategori'];?></td>
										<td><? echo $row['Harga'];?></td>
										<td><? echo $row['Penerbit'];?></td>
										<td><? echo $row['Rilis'];?></td>
										<td><? echo $row['Addedd'];?></td>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				
                <div class="modal-body">
                    <form action="simpan.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="JudulBuku">Judul Buku</label>
							<input type="text" name="JudulBuku" id="JudulBuku" class="form-control" required="true">
						</div>

						<div class="form-group">
							<label for="Deskripsi">Deskripsi</label>
							<input type="text" name="Deskripsi" id="Deskripsi" class="form-control" required="true">
						</div>

						<div class="form-group">
							<label for="IdKategori">Kategori</label>
							<select name="IdKategori" id="IdKategori" class="form-control" required="true">
								<option>Pilih Kategori</option>
								<option>Drama</option>
								<option>Slice of Life</option>
								<option>Romance</option>
								<option>Action</option>
							</select>
						</div>

						<div class="form-group">
							<label for="Harga">Harga</label>
							<input type="text" name="Harga" id="Harga" class="form-control" required="true">
						</div>
									
						<div class="form-group">
							<label for="IdPenerbit">Penerbit</label>
							<select name="IdPenerbit" id="IdPenerbit" class="form-control" required="true">
								<option>Pilih Penerbit</option>
								<option>Elexmedia</option>
								<option>Gagasmedia</option>
								<option>Bukune</option>
								<option>Mizan</option>
							</select>
						</div>

						<div class="form-group">
							<label for="TglRilis">Tanggal Rilis</label>
							<input type="text" name="TglRilis" id="TglRilis" class="form-control" required="true">
						</div>

						<div class="form-group">
							<label for="TglDitambahkan">Tanggal Ditambahkan</label>
							<input type="text" name="TglDitambahkan" id="TglDitambahkan" class="form-control" required="true">
						</div>						
                    </div>
					
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">

        $(function(){
        $('.btnTambahData').on('click', function(){
            $('#exampleModalLabel').html('Tambah Data Barang');
            $('.modal-footer button[type=submit]').html('Simpan');
            $('.modal-body form').attr('action', 'simpan.php');
        });
	   
        $('.tampilModalUbah').on('click', function(){
            $('#exampleModalLabel').html('Ubah Data Baranng');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', 'update.php');
            const kodebarang = $(this).data('id');
            $.ajax({
                url: 'getdata.php',
                data: {kodebarang : kodebarang},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kodebarang').val(data[0].kodebarang);
                    $('#namabarang').val(data[0].namabarang);
                    $('#satuan').val(data[0].satuan);
                }
            });
        });
    })
    </script>
</body>
</html>