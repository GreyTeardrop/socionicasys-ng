<div id="page-controls">
	<ul>
		<?php if (isset($links['create'])): ?>
		<li>
			<a href="<?php echo $links['create']; ?>">Создать</a>
		</li>
		<?php endif; ?>
		<?php if (isset($links['edit'])): ?>
		<li>
			<a href="<?php echo $links['edit']; ?>">Редактировать</a>
		</li>
		<?php endif; ?>
		<?php if (isset($links['delete'])): ?>
		<li>
			<a href="<?php echo $links['delete']; ?>">Удалить</a>
		</li>
		<?php endif; ?>
	</ul>
</div>
