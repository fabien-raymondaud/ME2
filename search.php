<?php get_header();?>
<?php if ( have_posts() ) : ?>
 
    <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header><!-- .page-header -->

	<div class="derniers-articles flex-container-h">

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>

    <?php endwhile; ?>

	</div>
<?php else : ?>


<?php endif; ?>
<?php get_footer();?>