<?php
//uni_italy_post_thumbnail( '' );
the_title( '<h1 class="entry-title">', '</h1>' );
?>
<div class="row">
    <div class="col-12 col-md-9">
		<?php
		the_content();
		?>
    </div>
    <aside class="col-12 col-md-3">
		<?php get_sidebar(); ?>
    </aside>
</div>

