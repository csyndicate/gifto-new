<div class="alm-item rs_mk_srch">
<a href="<?php the_permalink(); ?>"><img src="<?php the_field('rwd_product_api_image',get_the_id());  ?>?height=300&width=400&compress=none" alt="img" ></a>

   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php if((get_field('fromproduct_type',get_the_id())) == 'Ding Api'){the_content(); } ?>

</div>