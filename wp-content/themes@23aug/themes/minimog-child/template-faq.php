<?php 
/*
Template Name:Faq page
*/
?>
<?php get_header(); ?>


<?php
$args = array(
'post_type'=> 'epkb_post_type_1',
'orderby'    => 'ID',
'post_status' => 'publish',
'order'    => 'DESC',
'posts_per_page' => -1 // this will retrive all the post that is published 
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ) : ?>
<?php while ( $result->have_posts() ) : $result->the_post(); ?>
<b><?php the_title(); ?></b>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>


<?php get_footer();?>