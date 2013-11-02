<?php
//foreach ($news_item as $item) {
	echo '<h2>'.$news_item['title'].'</h2>';
	echo '<p>'.$news_item['text'].'</p>';
	
	echo anchor(
			'view/'.$news_item['id'].'/'.$news_item['title'],
			'View article'
			);
	echo anchor(
			'delete/'.$news_item['id'],
			'Delete article'
			);
	
//}

