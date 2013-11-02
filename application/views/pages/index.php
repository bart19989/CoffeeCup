<?php foreach ($pages as $page): ?>
	<h3><?php echo $page['title'] ?></h3>
		<p><?php echo $page['content'] ?></p>
		<p><?php echo $page['description'] ?></p>
		<?php
		echo anchor(
			'pages/view/'.$page['page_id'],
			'Edit'
		);
		echo anchor(
			'pages/delete/'.$page['page_id'],
			'Delete'
		);
		?>
		<hr>
<?php endforeach ?>
