<h2>Log In</h2>
<div class="edit-area">
	<form action="<?= site_url('/account/logOnCommit') ?>" method="POST">
		<fieldset>
			<? if ($error) { ?>
				<div>
					Invalid username or password entered.
				</div>
			<? } ?>
			<div>
				<label>Username</label>
				<input name="username" type="text" />
			</div>
			<div>
				<label>Password</label>
				<input name="password" type="password" />
			</div>
			<div>
				<label></label>
				<input type="Submit" value="Log In" />
			</div>
		</fieldset>
	</form>
	<p>Don't have an account? <?= anchor('/account/create', 'Create one in seconds!') ?></p>
</div>