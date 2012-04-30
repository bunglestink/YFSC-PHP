<h2>Delete Announcement Confirmation</h2>
<p>Are you sure you wish to delete the following announcement?</p>
<div class="edit-area">
	<form action="<?= site_url('/announcement/delete/'.$id) ?>" method="POST">
	<fieldset>
		<div>
			<label>ID:</label>
			<?=$id?>
		</div>
		<div>
			<label>Date:</label>
			<?=$announcementdate?>
		</div>
		<div>
			<label>Title:</label>
			<?=$title?>
		</div>
		<div>
			<label>Body:</label>
			<?=$body?>
		</div>
		<div>
			<label></label>
			<?= anchor('/announcement/index', 'Cancel') ?> or 
			<input type="Submit" value="Delete" />
		</div>
	</fieldset>
	</form>
</div>