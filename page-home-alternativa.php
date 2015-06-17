<?php
/**
 * The template for displaying all pages.
 * Template Name: Home Alternativa
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */
get_header();
?>
</div><!-- #main -->
</div><!-- .container -->
<?php get_template_part('parts/novidades');?>
<?php get_template_part('parts/participe-alternativo');?>
<?php get_footer('alternativo');?>
