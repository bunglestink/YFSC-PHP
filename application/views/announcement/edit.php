<? if ($id === 0) { ?>
	<h2>Create Announcement</h2>
<? } else { ?>
	<h2>Edit Announcement</h2>
<? } ?>
<div class="edit-area">
	<form action="<?= site_url('/announcement/commit') ?>" method="POST">
		<fieldset>
			<div>
				<label>ID:</label>
				<?= $id ?>
				<input name="id" type="hidden" value="<?=$id?>" />
			</div>
			<div>
				<label>Date:</label>
				<input name="announcementdate" class="date" value="<?=$announcementdate?>" />
			</div>
			<div>
				<label>Title:</label>
				<input name="title" value="<?=$title?>" />
			</div>
			<div>
				<label>Body:</label>
				<textarea name="body" rows="20" cols="50"><?=$body?></textarea>
			</div>
			<div>
				<label></label>
				<input type="Submit" />
			</div>
		</fieldset>
	</form>
</div>