<h2>Coaches</h2>
<h3><?= anchor('/coach/create', 'Add a Coach') ?></h3>
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>	
	<? foreach($coaches as $coach) { ?>
		<tr>
			<td><?=$coach->id?></td>
			<td><?=$coach->name?></td>
			<td><?= anchor('/coach/edit/'.$coach->id, 'Edit') ?></td>
			<td><?= anchor('/coach/deleteConfirm/'.$coach->id, 'Delete') ?></td>
		</tr>	
	<? } ?>
</table>