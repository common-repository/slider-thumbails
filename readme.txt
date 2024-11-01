=== Plugin Name ===
Contributors: claudiom
Donate link: http://www.claudiomarrero.com.ar/
Tags: slider, thumbails, slider jquery, slider images, slider carrusel
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 3.1

== Description ==

Una vez activo el plugin debes llamar a la funcion "sliderThumpShow()" en tu theme en donde quieras mostrar el Slider Thump

Recuerda que debes agregar la imagen destacada a tus entradas para que se muestren en el slider.


== Installation ==

1. Upload `Slider Thumb` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php sliderThumpShow(); ?>` in your templates
4. Recorda que al instalar el plugin aparecere una solapa en el menu de administracion de tu wordpress
donde deberas colocar la categoria que quieres mostrar en el plugin y la cantidad de entradas.
5. Recuerda que debes agregar la imagen destacada a tus entradas para que se muestren en el slider.

== Screenshots ==

1. un ejemplo aplicado en sergiobruni.com.ar/blog/ <img src="http://s.wordpress.org/extend/plugins/slider-thumbails/screenshot.jpg" />
2. Otro ejemplo mas <img src="http://s.wordpress.org/extend/plugins/slider-thumbails/screenshot-1.jpg" />


== Changelog ==

= 2.2 =
* Se elimino del query que trae los post el orderby y el order, para que tome por defecto las ultimas notas cargadas.

= 2.1 =
* Se limito a 20 caracteres el titulo que aparece como descripcion en el slider

= 2.1 =
* Cuando no se cargaba la imagen destacada en una categoria, el carrusel no mostraba una imagen que lo remplece.. esto esta solucionado.
La imagen se puede editar desde /img/thumboff.png por que vos quieras


= 1.2 =
* En algunos casos no funcionaba cuando la direccion del blog no era fija, ahora esta solucionado arreglando el path del blog en los vinculos a los css y js.

= 1.1 =
* Se mejoro cuestiones de inestabilidad de los JS en diferentes navegadores

= 1.0 =
* Finalizo la prueba y quedo utilizable en wordpress 2.9 en adelante.

