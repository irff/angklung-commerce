<div class="row">
	<div class="col-lg-4">
		 <h2>Register User</h2>
		 <form action="<?=base_url()?>users/register" method="post">
			<p><input type="text" name="username" placeholder="Username" class="form-control"></p>
			<p><input type="password" name="password" placeholder="Password" class="form-control"></p>
			<p><input type="text" name="email" placeholder="Email" class="form-control"></p>
			<p><input type="submit" value="Register"  class="btn"></p>
		 </form>
	</div>
</div>