	<div class="row">
		<div class="col-lg-3">
			<?php
				if($this->session->userdata('userID')) { ?>
					<p>Halo, <?=$this->session->userdata('username')?>! </p>
					<p>Anda login dengan status <?=$this->session->userdata('user_type')?></p>
					<p><a href="<?=base_url()?>users/logout">Logout</a></p>
				<?php } else { ?> 
					<a href="<?=base_url()?>users/login">Login</a> |
					<a href="<?=base_url()?>users/register">Register</a>
				<?php } ?>
				<?php
					if($this->session->userdata('userID')) {
						if($this->session->userdata('user_type') == 'admin') { ?>
							<a href="<?=base_url()?>items/new_item">Tambahkan Item</a>
							<?php
						} else
						if($this->session->userdata('user_type') == 'buyer') { ?>
							<p><a href="<?=base_url()?>users/get_cart/<?=$this->session->userdata('userID')?>">Lihat Keranjang</a></p>
							<a href="<?=base_url()?>users/empty_cart/<?=$this->session->userdata('userID')?>">Kosongkan Keranjang</a>
							<?php
						}
					}
				?>

		</div>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-lg-6">
						
					<a href="<?=base_url()?>">&laquo; Kembali</a>
					<img class="gambar" src="<?=base_url()?><?=$item['gambar']?>" alt="">
				</div>
				<div class="col-lg-6">
					<p>Nama barang : <?=$item['nama']?></p>
					<p>Spesifikasi : <?=$item['deskripsi']?></p>
					<p>Harga : Rp. <?=$item['harga']?>,00</p>
					<p>Stok : <?=$item['harga']?></p>
					<?php
				if($this->session->userdata('userID')) {
					if($this->session->userdata('user_type') == 'admin') { ?>
						<p><a href="<?=base_url()?>items/delete_item/<?=$item['itemID']?>">Delete</a></p>
						<p><a href="<?=base_url()?>items/edit_item/<?=$item['itemID']?>">Edit</a></p>
						<?php
					} else
					if($this->session->userdata('user_type') == 'buyer') { ?>
						<p><a href="<?=base_url()?>users/add_to_cart/<?=$this->session->userdata('userID')?>/<?=$item['itemID']?>">Tambah ke keranjang</a></p>
						<?php
					}
				} ?>

	</script>

				</div>
			</div>
		</div>
	</div>
