<?php

   	mysql_connect("localhost","","") or die(mysql_error()) ;

	mysql_select_db("test") or die(mysql_error());

	$id = addslashes($_REQUEST['id']); // requesting from an image tag 

    $image = mysql_query("select * from store where id=$id");

    $image = mysql_fetch_assoc($image) ; // taking the image out

    $image = $image['image'];

    header("Content-type: image/jpeg");

    echo $image ;
?>