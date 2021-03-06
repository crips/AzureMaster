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
				 <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" onclick="document.location.href='https://bukabuku.azurewebsites.net/add_new.php'">Tambah Buku</button>
				 <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" onclick="document.location.href='https://bukabuku.azurewebsites.net/kategoriku.php'">Kategori Buku</button>
				 <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" onclick="document.location.href='https://bukabuku.azurewebsites.net/penerbitan.php'">Penerbit Buku</button>

				 <div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Buku Baru</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

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