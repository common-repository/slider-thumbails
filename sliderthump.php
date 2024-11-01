<?php
/*

Plugin Name: Slider Thumbail Carrusel

Plugin URI: http://www.claudiomarrero.com.ar/slider-thumbail-carrusel/

Description: Toma de una categoria las imagenes destacadas de las ultimas entradas y las coloca en un slider tipo carrusel, y coloca un excpert de la nota a la izquierda fuera del carrusel, desarrollado con Jquery y php.

Author: Claudio Adrian Marrero

Author URI: http://www.claudiomarrero.com.ar/

Version: 2.2

*/



define('path',get_bloginfo('url').'/wp-content/plugins/slider-thumbails/');



function sliderThumpHead(){

	?>

	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo path; ?>css/style.css" />

	<script type="text/javascript" src="<?php echo path; ?>js/jquery-1.5.min.js" charset="utf-8"></script>

	<script type="text/javascript" src="<?php echo path; ?>js/jquery.timers.js" charset="utf-8"></script>

	<script type="text/javascript" src="<?php echo path; ?>js/jquery.movingboxes.js" charset="utf-8"></script>

<script type="text/javascript">

	jQuery.noConflict();

	jQuery(document).ready(function(){

	

	var idArrays = new Array();

	<?php 

	$categoria = get_option('sliderCategory');

	$showPosts = get_option('sliderShowPosts');

	?>

	<?php query_posts('cat='.$categoria.'&showposts='.$showPosts); ?>

	<?php $i=1; if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	idArrays[<?php echo $i; ?>] = <?php the_id(); ?>;

	<?php if($i==1){?>

	verExcerpt('<?php the_id(); ?>');

	<? } $i++; endwhile; ?>

	<?php wp_reset_query(); ?>



	jQuery('#slider-two').movingBoxes({

    startPanel   : 1,    // start with this panel

    wrap         : true, // psuedo wrapping - it just runs to the other end

    width        : 545,  // overall width of movingBoxes

    imageRatio   : 1,    // Image ration set to 1:1 (square image)

    navFormatter : function(){ return "&#9679;"; }, // function which returns the navigation text for each panel

	fixedHeight  : true,

	ids: idArrays

   });

	

});

function verExcerpt(id){

	jQuery('#excerptResult').fadeOut('slow');

	jQuery('#excerptResult').fadeIn('slow');

	jQuery('#excerptResult').load('<?php echo path; ?>/excerpt.php',{post:id});

}

</script>

<?php

}





function sliderThumpShow(){

    

?>

<div class="sliderThumpbail">

    <div class="moreInfoSlider">

        <div id="excerptResult"></div>

    </div>

    <div class="slider" id="slider-two">

    <?php 

	$categoria = get_option('sliderCategory');

	$showPosts = get_option('sliderShowPosts');

	?>

    <?php query_posts('cat='.$categoria.'&showposts='.$showPosts); ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
       <div class="panel" onclick="verExcerpt('<?php the_id(); ?>');">
			 <?php if(has_post_thumbnail()) {
	         the_post_thumbnail();
			 }else{ ?>
             <img width="180px" height="132px" src="<?php echo path; ?>img/thumboff.png" />
			 <?php } 
					$titulo = the_title('','',false);
					$limite = 20;
			 ?>
             
            <div class="titleImageSlider"><span><?php echo slider_cortar($titulo, $limite); ?></span></div>

       </div>
		
        
        
     <?php endwhile; ?>

    <?php wp_reset_query(); ?>

    </div>

    <div class="clear"></div>

</div>

    <?php

}


function slider_cortar($text0, $limite){
    $comp = strlen($text0);
    if($comp > $limite){
        return substr($text0, 0, $limite)."...";
    }
    else{
        return $text0;
    }
}


add_action('wp_head', 'sliderThumpHead');

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size(180,165);



function sliderThumpMenu(){

	$sliderThump = add_menu_page('SliderThump', 'SliderThump', 10, 'slider-options', 'sliderOptions');

	add_contextual_help($sliderThump ,'Slider Options');



}

function sliderOptions(){

	?>

    <div class="wrap">

    <h2>Slider Thump Options</h2>

    <span><strong>Nota:</strong> una vez activo el plugin debes llamar a la funcion "sliderThumpShow()" en tu theme en donde quieras mostrar el Slider Thump</span><br><br>

    <?php 

	if(isset($_POST['guardarSlider'])){

		update_option('sliderCategory',$_POST['sliderCategory']);

		update_option('sliderShowPosts',$_POST['sliderShowPosts']);

		

		echo 'Se guardaron los datos correctamente<br><br>';

	}

	$categoria = get_option('sliderCategory');

	$showPosts = get_option('sliderShowPosts');

	?>

    <form action="" method="post">

	<label>Categoria que Mostrara: <input name="sliderCategory" type="text" value="<?php echo $categoria; ?>" size="5"></label><br><br>

    <label>Cantidad de Entradas a Mostrar: <input name="sliderShowPosts" type="text" value="<?php echo $showPosts; ?>" size="5"></label><br><br>

    <input name="guardarSlider" type="submit" value="Guardar Cambios">

    </form>

    </div>

<?php

	

}

add_option('sliderCategory', '1');

add_option('sliderShowPosts', '10');

add_action('admin_menu','sliderThumpMenu');



?>