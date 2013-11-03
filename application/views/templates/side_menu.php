<div id="sidr">
<ul class="side-nav">
	<?php foreach ($menu as $item) : ?>
		<li><?php echo anchor($item['name'], ucfirst($item['name'])) ?></li>
		<li class="divider"></li>
	<?php endforeach ?>
	<li class="active"><a href="#">Link 1</a></li>
	<li class="divider"></li>
</ul>
</div>
<!-- Begin panel, ends in footer -->
