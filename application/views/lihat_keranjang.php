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
			<a href="<?=base_url()?>">&laquo; Kembali</a>
			<div class="row">

	<?php
	if(!isset($cart) || sizeof($cart) == 0) {
		?>
			<div class="col-lg-12">
				<p></p>
				<p>Keranjang anda kosong.</p>
			</div>
		<?php
	} else {
		foreach($cart as $row) {
			?>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="item">
					<a href="<?=base_url()?>items/item/<?=$row['itemID']?>"><img src="<?=base_url()?><?=$row['gambar']?>" alt=""></a>
					<p><a href="<?=base_url()?>items/item/<?=$row['itemID']?>"><?=$row['nama']?></a> </p>
					<p><?=$row['deskripsi']?></p>
					<p>Harga : Rp <?=$row['harga']?>,00</p>
					</div>
				</div>
			<?php
		}
	}
	?>
			</div>
		</div>
	</div>
