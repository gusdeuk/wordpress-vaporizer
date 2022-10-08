<?php
// HELP HERE
// http://wpml.org/documentation/support/wpml-coding-api/
// NO CARGA CSS Y JS DE SELECTOR
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

//--------------------------------------------------------
// BANDERITAS
//--------------------------------------------------------
function language_selector_flags(){
	$languages = icl_get_languages('skip_missing=0&orderby=code&order=desc');
    if(!empty($languages)){

		foreach($languages as $l){
			if ($l['language_code']=="en") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="item langico-'.$l['language_code']."\" title='English'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\" title='English'></a>";
				}
			}
		}	

		foreach($languages as $l){
			if ($l['language_code']=="nl") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="langico-'.$l['language_code']."\" title='Dutch'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\" title='Dutch'></a>";
				}
			}
		}	

		foreach($languages as $l){
			if ($l['language_code']=="fr") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="langico-'.$l['language_code']."\" title='Francais'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\" title='Francais'></a>";
				}
			}
		}

		foreach($languages as $l){

			if ($l['language_code']=="de") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="langico-'.$l['language_code']."\" title='Deutsch'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\"  title='Deutsch'></a>";
				}
			}
			
		}	
		
		foreach($languages as $l){

			if ($l['language_code']=="it") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="langico-'.$l['language_code']."\" title='Italian'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\"  title='Italian'></a>";
				}
			}
			
		}	

		foreach($languages as $l){

			if ($l['language_code']=="es") {
				if(!$l['active']) {
					echo '<a href="'.$l['url'].'" class="langico-'.$l['language_code']."\" title='Spanish'></a>";
				} else {
					echo '<a href="javascript:void();" class="selected langico-'.$l['language_code']."\"  title='Spanish'></a>";
				}
			}
			
		}	
    }
}

?>