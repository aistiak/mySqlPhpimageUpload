<html>
	<head>
		<title>upload image</title>
	</head>
	<body>
		
		 <form action="index.php" method="POST" enctype="multipart/form-data"> 
		 	File:
		 	<input type="file" name="image"> <input type="submit" value="Upload">
		 </form>
		<?php
          // connect to database 
		mysql_connect("localhost","","") or die(mysql_error()) ;
		mysql_select_db("test") or die(mysql_error());

		// file properties 
	    
              
        if(!isset($_FILES['image']))
        	echo "please select and image " ;
        else
        {
        	echo $file = $_FILES['image']['tmp_name'] ; 
           	$image = addslashes( file_get_contents($_FILES['image']['tmp_name']) );
           	// addslashes function chara image table e insert hoe na
            $image_name = $_FILES['image']['name'];
            $image_size = getimagesize($_FILES['image']['tmp_name']) ;
            
            if($image_size==FALSE) // return false if uoploaded file is not an image
            	echo "not an image";
            else
            {
            	
               //mysql_query("INSERT INTO store VALUES ('','$image_name','$image')")
               $sql = "insert into store values('','".$image_name."','".$image."')";
               if(!$insert = mysql_query($sql) )
                	echo "Problem uploading image" ;

                else
                {
                	$lastid = mysql_insert_id() ;
                	echo "Image uploaded<p/>your image :<p/> <img src=get.php?id=$lastid >";
                }
            }
        }
        
		?>
	</body>
</html>