<? if ($id === 0) { ?>
	<h2>Add Calendar Item</h2>
<? } else { ?>
	<h2>Edit Calendar Item</h2>
<? } ?>
<div class="edit-area">
	<form action="<?= site_url('/calendarItem/commit') ?>" method="POST">
		<fieldset>
			<div>
				<label>ID:</label>
				<?= $id ?>
				<input name="id" type="hidden" value="<?=$id?>" />
				<input name="registrationtermid" type="hidden" value="<?=$registrationtermid?>" />
			</div>
			<div>
				<label>Days:</label>
				<input name="days" value="<?=$days?>" />
			</div>
			<div>
				<label>Saturday Notes:</label>
				<textarea name="saturdaynotes" rows="10" cols="50"><?=$saturdaynotes?></textarea>
			</div>
			<div>
				<label>Sunday Notes:</label>
				<textarea name="sundaynotes" rows="10" cols="50"><?=$sundaynotes?></textarea>
			</div>
			<div>
				<label></label>
				<input type="Submit" />
			</div>
		</fieldset>
	</form>
</div>