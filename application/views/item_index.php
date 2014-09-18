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
	<?php
	
	if(!isset($items)) {
		?>
			<p>Ooops. There are no items in stock.</p>
		<?php
	} else {
		foreach($items as $row) {
			?>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="item">
					<a href="<?=base_url()?>items/item/<?=$row['itemID']?>"><img src="<?=base_url()?><?=$row['gambar']?>" alt=""></a>
					<p><a href="<?=base_url()?>items/item/<?=$row['itemID']?>"><?=$row['nama']?></a> </p>
					<p><?=$row['deskripsi']?></p>
					<p>Harga : Rp <?=$row['harga']?>,00</p>
					<p>Stok : <?=$row['stok']?></p>
					<?php
						if($this->session->userdata('userID')) {
							if($this->session->userdata('user_type') == 'admin') { ?>
								<p><a href="<?=base_url()?>items/delete_item/<?=$row['itemID']?>">Delete</a></p>
								<p><a href="<?=base_url()?>items/edit_item/<?=$row['itemID']?>">Edit</a></p>
								<?php
							} else
							if($this->session->userdata('user_type') == 'buyer') { ?>
								<p><a href="<?=base_url()?>users/add_to_cart/<?=$this->session->userdata('userID')?>/<?=$row['itemID']?>">Tambah ke keranjang</a></p>
								<?php
							}
						}
				?>
					</div>
				</div>
			<?php
		}
	}
	?>
			</div>
		</div>
	</div>
