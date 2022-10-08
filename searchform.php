<?php
/*
 * Search Form Template
*/
?>
<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline search-form">
    <fieldset>

		<div class="input-group">
			<input type="text" name="s" id="search" placeholder="<?php _e('Search','bonestheme'); ?>" value="<?php the_search_query(); ?>" class="" />

			<button type="submit" class="btn-search">
				<span class="fa fa-search "  aria-hidden="true"></span>
			</button>
	    </div>

    </fieldset>
</form>

