<?php
include('../../../wp-blog-header.php');
$post = $_POST['post'];

?>
<?php query_posts('p='.$post); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="titleExcerpt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;&nbsp;
<a href="<?php the_permalink(); ?>"><img src="<?php echo path; ?>/img/moreProyect.gif" width="22" height="23" /></a></div>
<div class="exerptContent"><?php the_excerpt(); ?></div>
<? endwhile; ?>
<?php wp_reset_query(); ?>