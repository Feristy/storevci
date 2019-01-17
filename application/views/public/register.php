<form method="post" class="form-sign">
	<h1>Sign Up</h1>
	<div class="msg-sign"><?=$msg?></div>
	<div class="form-group">
		<input type="text" class="form-feya" name="name" placeholder="Username">
	</div>
	<div class="form-group">
		<input type="text" class="form-feya" name="email" placeholder="Email">
	</div>
	<div class="form-group">
		<input type="password" class="form-feya" name="pass" placeholder="Password">
	</div>
	<div class="form-group">
		<input type="password" class="form-feya" name="confirm" placeholder="Password Confirm">
	</div>
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
	<button type="submit" class="btn btn-sign btn-block" name="submit" value="1">Sign Up</button>
</form>