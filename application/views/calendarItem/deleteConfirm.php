<h2>Delete Coach Confirmation</h2>
<p>Are you sure you wish to delete the following coach?</p>
<div class="edit-area">
	<form action="<?= site_url('/calendarItem/delete/'.$id) ?>" method="POST">
	<fieldset>
		<div>
			<label>ID:</label>
			<?=$id?>
		</div>
		<div>
			<label>Days:</label>
			<?=$days?>
		</div>
		<div>
			<label>Saturday Notes:</label>
			<?=$saturdaynotes?>
		</div>
		<div>
			<label>Sunday Notes:</label>
			<?=$sundaynotes?>
		</div>
		<div>
			<label></label>
			<?= anchor('/calendarItem/index/'.$registrationtermid, 'Cancel') ?> or 
			<input type="Submit" value="Delete" />
		</div>
	</fieldset>
	</form>
</div>