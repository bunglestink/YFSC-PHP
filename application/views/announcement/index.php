<h2>Announcements</h2>
<h3><?= anchor('/announcement/create', 'Create a New Announcement') ?></h3>
<table>
	<tr>
		<th>ID</th>
		<th>Date</th>
		<th>Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>	
	<? foreach($announcements as $announcement) { ?>
		<tr>
			<td><?=$announcement->id?></td>
			<td><?=$announcement->announcementdate?></td>
			<td><?=$announcement->title?></td>
			<td><?= anchor('/announcement/edit/'.$announcement->id, 'Edit') ?></td>
			<td><?= anchor('/announcement/deleteConfirm/'.$announcement->id, 'Delete') ?></td>
		</tr>	
	<? } ?>
</table>