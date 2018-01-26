<div class="container">
	<?php foreach($about as $row): ?>
		<h1><?= $row->i_title; ?></h1>
		<p><?= $row->i_description; ?>
	<?php endforeach; ?>
</div>