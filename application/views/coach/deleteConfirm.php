<h2>Delete Coach Confirmation</h2>
<p>Are you sure you wish to delete the following coach?</p>
<div class="edit-area">
	<form action="<?= site_url('/coach/delete/'.$id) ?>" method="POST">
	<fieldset>
		<div>
			<label>ID:</label>
			<?=$id?>
		</div>
		<div>
			<label>Name:</label>
			<?=$name?>
		</div>
		<div>
			<label>Primary Info:</label>
			<?=$primaryinfo?>
		</div>
		<div>
			<label>Secondary Info:</label>
			<?=$secondaryinfo?>
		</div>
		<div>
			<label></label>
			<?= anchor('/coach/index', 'Cancel') ?> or 
			<input type="Submit" value="Delete" />
		</div>
	</fieldset>
	</form>
</div>