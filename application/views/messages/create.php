<h2>Creeate a news item</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('messages/create');?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Text</label>
	<textarea name="text"></textarea><br />
	
	<label for="slug">Categorie</label>
	<input type="input" name="slug" /><br />

	<input type="submit" name="submit" value="Create news item" />

</form>