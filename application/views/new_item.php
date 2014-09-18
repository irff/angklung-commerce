<div class="container">
<div class="row">
	<div class="col-lg-5">
	<h2>Tambahkan Item</h2>
	<div class="row">
		<div class="c-12 columns">
			<form action="<?=base_url()?>items/new_item" method="post" enctype="multipart/form-data">
				<input type="text" name="nama" placeholder="Nama barang" class="form-control">
				<br>
				<textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi / spesifikasi" class="form-control"></textarea>
				<br>
				<input type="text" name="harga" placeholder="Harga" class="form-control">
				<br>
				<input type="text" name="stok" placeholder="Stok" class="form-control">
				<br>
				Gambar<input type="file" id="gambar" name="gambar" placeholder="Upload Gambar" class="form-control">
				<br>
				<p><input type="submit" value="Tambahkan Item" class="btn"></p>
			</form>
		</div>
	</div>
		
	</div>
</div>
</div>