<?php
	include('simple_html_dom.php');
	include('config.php');
	global $db;
	$html=file_get_html('http://www.houzz.com/photos/products');
	$data=$html->find('.ic');
	$query=$db->prepare("INSERT INTO Products(`product_id`,`title`,`desc`,`href`,`image`,`price`) VALUES (:p_id,:title,:desc,:href,:img,:price)");
	$i=0;
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
		  try{
		  $query->execute(array(
		  	':p_id'=>$objid,
		  	':title'=>$title,
		  	':desc'=>$desc,
		  	':href'=>$href,
		  	':img'=>$img,
		  	':price'=>$price
		  	));
		  } catch(PDOException $e){
		  	echo "error:";
		  	echo $ex->getMessage();
		  }
	}  		
?>