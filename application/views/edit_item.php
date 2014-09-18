<div class="row">
	<div class="col-lg-5">
		<h2>Edit Item</h2>
		<?php if($success==1) { ?>
			<p><em>Item berhasil diubah!</em> <a href="<?=base_url()?>">Kembali</a></p>
		<?php } ?>
		<form action="<?=base_url()?>items/edit_item/<?=$item['itemID']?>" method="post">
			Nama barang 
			<input type="text" name="nama" value="<?=$item['nama']?>" class="form-control">
			<br>
			Deskripsi
			<textarea name="deskripsi" id="deskripsi" class="form-control" rows="6"><?=$item['deskripsi']?></textarea>
			Harga
			<input type="text" name="harga" value="<?=$item['harga']?>" class="form-control">
			<br>
			Stok
			<input type="text" name="stok" value="<?=$item['stok']?>" class="form-control">
			<br>
			Gambar
			<input type="text" name="gambar" value="<?=$item['gambar']?>" class="form-control">
			<br>
			<input type="submit" value="Simpan Item" class="btn">
		</form>
	</div>
</div>