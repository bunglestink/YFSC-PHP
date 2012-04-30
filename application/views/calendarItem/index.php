<h2>Registration Terms</h2>
<h3><?= anchor('/calendarItem/create/'.$registrationTermId, 'Add a Registration Term') ?></h3>
<table>
	<tr>
		<th>ID</th>
		<th>Days</th>
		<th>Saturday Notes</th>
		<th>Sunday Notes</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>	
	<? foreach($calendarItems as $item) { ?>
		<tr>
			<td><?=$item->id?></td>
			<td><?=$item->days?></td>
			<td><?=$item->saturdaynotes?></td>
			<td><?=$item->sundaynotes?></td>
			<td><?= anchor('/calendarItem/edit/'.$item->id, 'Edit') ?></td>
			<td><?= anchor('/calendarItem/deleteConfirm/'.$item->id, 'Delete') ?></td>
		</tr>	
	<? } ?>
</table>