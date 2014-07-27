<div id="signuppage" class="container">

	<h2>
		Become a CanVoler!
	</h2>
	<?=form_open("signup/doregister", array("class" => "form-horizontal", "role" => "form")) ?>

	<?php if(validation_errors() != ""): ?>
		<div class="alert alert-danger"><?=validation_errors(); ?></div>
	<?php endif ?>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">First Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control signupinput" id="firstname" name="firstname" value="<?=set_value('firstname'); ?>" placeholder="First Name">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control signupinput" id="lastname" name="lastname" value="<?=set_value('lastname'); ?>" placeholder="Last Name">
		</div>
	</div>

	<div class="form-group">
		<label for="yearofbirth" class="col-sm-2 control-label">Year of Birth</label>
		<div class="col-sm-3">
			<input type="text" class="form-control signupinput" id="yearofbirth" name="yearofbirth" value="<?=set_value('yearofbirth'); ?>" placeholder="Year of Birth (e.g. 1998)">
		</div>
	</div>

	<div class="form-group">
		<label for="quadrant" class="col-sm-2 control-label">City of Calgary Quadrant</label>
		<div class="col-sm-2">
			<select name="quadrant" class="form-control signupinput">
				<option value="ne" <?=set_select('quadrant', 'ne'); ?>> NE </option>
				<option value="nw" <?=set_select('quadrant', 'nw'); ?>> NW </option>
				<option value="se" <?=set_select('quadrant', 'se'); ?>> SE </option>
				<option value="sw" <?=set_select('quadrant', 'sw'); ?>> SW </option>
				<option value="downtown" <?=set_select('quadrant', 'downtown'); ?>> Downtown </option>

			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">E-Mail (Username)</label>
		<div class="col-sm-8">
			<input type="email" class="form-control signupinput" id="email" name="email" value="<?=set_value('email'); ?>" placeholder="E-Mail (Will be your username)">
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Choose a Password</label>
		<div class="col-sm-8">
			<input type="password" class="form-control signupinput" id="password_signup"  value="<?=set_value('password'); ?>"name="password" placeholder="Choose a Password">
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Password (Again)</label>
		<div class="col-sm-8">
			<input type="passwordconfirm" class="form-control signupinput" id="password_validate" value="<?=set_value('passconf'); ?>" name="passconf" placeholder="Confirm your password">
		</div>
	</div>


	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Please solve the CAPTCHA</label>
		<div class="col-sm-8">
			<?=recaptcha_get_html($publickey) ?>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-3">
			<button type="submit" class="form-control btn btn-primary signupinput" id="completeregistration">Complete Registration</button>
		</div>
	</div>


	</form>

</div>