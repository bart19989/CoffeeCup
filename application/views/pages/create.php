<h2>Creeate a new page</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('pages/create');?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="content">Content</label>
	<textarea name="content"></textarea><br />
	
	<input type="hidden" name="site_id" value="1" /><br />

	<input type="submit" name="submit" value="Create page" />

</form>