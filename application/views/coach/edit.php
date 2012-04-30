<? if ($id === 0) { ?>
	<h2>Add Coach</h2>
<? } else { ?>
	<h2>Edit Coach</h2>
<? } ?>
<div class="edit-area">
	<form action="<?= site_url('/coach/commit') ?>" method="POST">
		<fieldset>
			<div>
				<label>ID:</label>
				<?= $id ?>
				<input name="id" type="hidden" value="<?=$id?>" />
			</div>
			<div>
				<label>Name:</label>
				<input name="name" value="<?=$name?>" />
			</div>
			<div>
				<label>Primary Info:</label>
				<textarea name="primaryinfo" rows="15" cols="50"><?=$primaryinfo?></textarea>
			</div>
			<div>
				<label>Body:</label>
				<textarea name="secondaryinfo" rows="15" cols="50"><?=$secondaryinfo?></textarea>
			</div>
			<div>
				<label></label>
				<input type="Submit" />
			</div>
		</fieldset>
	</form>
</div>