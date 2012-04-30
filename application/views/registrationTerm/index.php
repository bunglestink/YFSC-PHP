<h2>Registration Terms</h2>
<h3><?= anchor('/registrationTerm/create', 'Add a Registration Term') ?></h3>
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>StartDate</th>
		<th>EndDate</th>
		<th>Calendar Items</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>	
	<? foreach($registrationTerms as $term) { ?>
		<tr>
			<td><?=$term->id?></td>
			<td><?=$term->termname?></td>
			<td><?=$term->startdate?></td>
			<td><?=$term->enddate?></td>
			<td><?= anchor('/calendarItem/index/'.$term->id, 'View') ?></td>
			<td><?= anchor('/registrationTerm/edit/'.$term->id, 'Edit') ?></td>
			<td><?= anchor('/registrationTerm/deleteConfirm/'.$term->id, 'Delete') ?></td>
		</tr>	
	<? } ?>
</table>