<div class="jumbotron">
	
	<h1 style="margin-bottom:30px">Login</h1>

	<?php if(isset($loginerror)): ?>
		<div class="alert alert-danger"><?=$loginerror ?></div>
	<?php endif ?>

	<?=form_open("login/dologin") ?>

		<div>
			<label for="username">Username: 
				<input type="text" name="username" id="username" placeholder="you@example.com">
			</label>
		</div>
		<div>
			<label for="password">Password:
				<input type="password" name="password" id="password" placeholder="Your password">
			</label>
		</div>
		<div>
			<label for="rememberme">Remember Me </label>
				<input type="checkbox" name="rememberme">
			</label>
		</div>
		<div>
			<input type="submit" value="Log In" class="btn btn-primary"/>
		</div>



	</form>
</div>