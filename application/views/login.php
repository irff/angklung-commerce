<div class="row">
	<div class="col-lg-4">
		<h2>Login</h2>
		<?php
			if($error == 1) { ?>
				<p>Kombinasi username dan password tidak ditemukan.</p>
		<?php } ?>
	<form action="<?=base_url()?>users/login" method="post">
		<p><input type="text" name="username" placeholder="Username" class="form-control"></p>
		<p><input type="password" name="password" placeholder="Password" class="form-control"></p>

		<p><input type="submit" value="Login" class="btn"></p>
	</form>
	</div>

</div>