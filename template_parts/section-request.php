<?php
	$shower  = get_sub_field( 'shower' );
	$editor = get_sub_field( 'editor' );
	
	if ( ! $shower ) : ?>
        <section class="section-request" >
            <div class="container">
                <div class="section-request__inner">
					<div class="editor">
                        <?=$editor?>
                    </div>
                </div>
            </div>
        </section>

	<?php endif; ?>