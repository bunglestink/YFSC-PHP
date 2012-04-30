<h2>YFSC Coaches</h2>
<p>These professional skaters teach group lessons for the club. Click any link for more information.</p>
<ul>
	<? foreach ($coaches as $coach) { ?>
		<li><?= anchor('/home/clubCoaches/'.$coach->id, $coach->name) ?></li>
	<? } ?>
</ul>
<hr />