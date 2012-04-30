<h2>Delete Coach Confirmation</h2>
<p>Are you sure you wish to delete the following coach?</p>
<div class="edit-area">
	<form action="<?= site_url('/registrationTerm/delete/'.$id) ?>" method="POST">
	<fieldset>
		<div>
			<label>ID:</label>
			<?=$id?>
		</div>
		<div>
			<label>Name:</label>
			<?=$termname?>
		</div>
		<div>
			<label>Start DAte:</label>
			<?=$startdate?>
		</div>
		<div>
			<label>End Date:</label>
			<?=$enddate?>
		</div>
		<div>
			<label></label>
			<?= anchor('/registrationTerm/index', 'Cancel') ?> or 
			<input type="Submit" value="Delete" />
		</div>
	</fieldset>
	</form>
</div>