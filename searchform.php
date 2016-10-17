<?php
/**
 * Template for displaying search forms in Broden
 *
 * @package Broden
 */
?>
<form method="get" class="search-form" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php echo esc_html__( 'SEARCH...', 'broden' ); ?>">
	<button type="submit" class="btn btn-default"><?php echo esc_html__('Search', 'broden' ); ?></button>
</form>