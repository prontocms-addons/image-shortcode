<?php

use Pronto\ShortcodeContainer;
use Pronto\ConfigContainer;
use Pronto\GlobalContainer;
use Pronto\HelperContainer;

ShortcodeContainer::add('image', function($attributes) {
	$page = GlobalContainer::get('page');
	$image = array_shift($attributes);
	if(HelperContainer::relative($image)) {
		$image = $page->folder().$image;
	}
	$defaults = array(
		'alt' => ''
	);
	$options = array_merge($defaults, $attributes);
	$append = array();
	foreach($options as $key => $val) {
		$append[] = ' '.$key.'="'.get_html($val).'"';
	}
	$xhtml = ConfigContainer::get('xtml') ? ' /' : '';
	return '<img src="'.$image.'"'.implode($append).$xhtml.'>';
});

?>
