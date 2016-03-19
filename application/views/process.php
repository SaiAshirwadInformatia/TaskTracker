<?php
session_start();

include "connect.php";

if($_POST["submit"])
{

if($_SESSION("name"))
{
	$name = $_FILES["file"]["name"];
	$name = $_FILES["file"]["type"];
	$name = $_FILES["file"]["size"];
	$temp_name = $_FILES["file"]["temp_name"];
	$error = $_FILES["file"]["error"];

	if ($tpe=="image/jpeg" || $type =="image/gif")

	{

		if($size>11000 && $size<170000)
		{
				if($error>0)
				{
					echo"Errro!!!".$error;
				}
				else{
					if(file_exists("assets/images/".$name))
					{
						echo $name."already exists.";
					}
					else{

						$location="assets/images/".$name;
						move_uploaded_files($temp_name,$location);

						
						$user=$SESSION("name");

						$sqlcode = mysql_query("INSERT INTO task (id,location) VALUES ('','$user','$location'));

						echo "<a href='$location'>click here to view your image.</a>"
					}
				}


		}
		else
		{
			echo"Please check the size of your file"
		}

	}

	else{

		echo"invalid file format";
	}


}
else
{



}

}

else
{


echo"please select the file";

}
?>