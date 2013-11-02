<?php  ?>
<?php foreach ($messages as $messages_item): ?>
    <h2><?php echo $messages_item['title'] ?></h2>
    <div id="main">
    	<p>
        	<?php echo $messages_item['text'] ?>
        </p>

    </div>
    <?php
    	echo anchor( 
				'messages/view/'.$messages_item['message_id'].'/'.$messages_item['title'],
				'View article'
			);
		echo anchor(
				'messages/delete/'.$messages_item['message_id'],
				'Delete article'
			);
		echo anchor(
				'messages/view/'.$messages_item['slug'],
				'View more of '.$messages_item['slug']
			);
    ?>

<?php endforeach ?>