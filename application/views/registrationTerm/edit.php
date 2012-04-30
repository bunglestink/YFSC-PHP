<? if ($id === 0) { ?>
	<h2>Add Term</h2>
<? } else { ?>
	<h2>Edit Term</h2>
<? } ?>
<div class="edit-area">
	<form action="<?= site_url('/registrationTerm/commit') ?>" method="POST">
		<fieldset>
			<div>
				<label>ID:</label>
				<?= $id ?>
				<input name="id" type="hidden" value="<?=$id?>" />
			</div>
			<div>
				<label>Name:</label>
				<input name="termname" value="<?=$termname?>" />
			</div>
			<div>
				<label>Name:</label>
				<input name="startdate" value="<?=$startdate?>" class="date" />
			</div>
			<div>
				<label>Name:</label>
				<input name="enddate" value="<?=$enddate?>" class="date" />
			</div>
			<div>
				<label></label>
				<input type="Submit" />
			</div>
		</fieldset>
	</form>
</div>