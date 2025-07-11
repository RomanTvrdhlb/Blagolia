<?php
	function display_editor_blocks( array $editors, $class = 'editors' ): void {
		if ( ! $editors ) return;
		?>
        <div class="<?= $class;?>">
			<?php foreach ( $editors as $editor ) : ?>
                <div class="<?= $class;?>__coll editor">
					<?= $editor['editor']; ?>
                </div>
			<?php endforeach; ?>
        </div>
		<?php
	}
?>
