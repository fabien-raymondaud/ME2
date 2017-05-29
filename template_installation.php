<?php
/*
Template Name: Installation
*/
?>
<?php get_header();?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="content">
    <?php echo do_shortcode('[ff id="1"]');?>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>



