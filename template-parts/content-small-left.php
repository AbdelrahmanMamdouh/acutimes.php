<div class="c-section">
	<div class="row">
		<div class="col-md-7">
			<a href=""><img class="article__img" src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></a>
		</div>
		<div class="col-md-5 col-md-pull-7">
			<h3><a class="h3" href="<?php echo esc_url( get_permalink() ) ?>" ><?php the_title() ?></a></h3>
			<?php cairo_jazz_club_posted_on(); ?>
			<p><?php the_content() ?></p>
			<p class="align-right article__link"><a href="<?php echo esc_url( get_permalink() ) ?>" class="h3">Read Full Article</a></p>
		</div>
	</div>
</div>