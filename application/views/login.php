<div class="jumbotron">
	<?=form_open("login/dologin") ?>
	<div id="logininlogin">
		<h1 style="margin-bottom:30px">Login</h1>
	</div>
	<?php if(isset($loginerror)): ?>
		<div class="alert alert-danger"><?=$loginerror ?></div>
	<?php endif ?>

	

		<div id="logininformation">
			<div>
				<label for="username">Username: 
					<input type="text" name="username" id="usernameinlogin" placeholder="you@example.com">
				</label>
			</div>
			<div>
				<label for="password">Password:
					<input type="password" name="password" id="passwordinlogin" placeholder="Your password">
				</label>
			</div>
			
			<div>
				<label for="rememberme">Remember Me </label>
					<input type="checkbox" name="rememberme">
				</label>
			</div>
			<div id="forgotpasswordinpassword">	<a href="<?=base_url() ?>forgottenpassword">
				Forgot Your Password?
			</div>
			<div>
				<input type="submit" value="Log In" id="buttoninlogin" class="btn btn-primary"/>
			</div>
		</div>


	</form>
</div>