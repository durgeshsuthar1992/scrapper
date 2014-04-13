<?php
	include('simple_html_dom.php');

	$html=file_get_html('http://www.houzz.com/photos/products');
	$data=$html->find('.ic');
	foreach ($data as $key) {
		  $objid=$key->objid;
		  $a=$key->first_child()->first_child()->first_child();
		  $href=$a->href;
		  $img=$a->first_child()->first_child()->src;
		  $desc=$a->last_child()->plaintext;
		  $photometa=$key->children(1)->first_child();
		  $title=$photometa->plaintext;
		  $rates=$photometa->next_sibling();
		  $price=$rates->first_child()->plaintext;
		  $mrp=$rates->first_child()->next_sibling()->plaintext;
		  
	}  		
?>