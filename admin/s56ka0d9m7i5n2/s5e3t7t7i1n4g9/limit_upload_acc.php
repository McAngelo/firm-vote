<?php

// Define file size limit 
$limit_size=500000;

//set where you want to store files
//in this example we keep file in folder upload 
//$HTTP_POST_FILES['ufile']['name']; = upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path= "upload/".$_FILES['ufile']['name'];

if($ufile =none)
{

// Store upload file size in $file_size 
$file_size=$_FILES['ufile']['size'];

if($file_size >= $limit_size){
echo "Your file size is over limit<BR>";
echo "Your file size = ".$file_size;
echo " K";
echo "<BR>File size limit = 500000 k";
}
else {

//copy file to where you want to store the file
if(move_uploaded_file($_FILES['ufile']['tmp_name'], $path))
{
echo "Successful<BR/>"; 
echo "<img src=\"$path\" width=\"150\" height=\"150\">";
}
else
{
echo "Copy Error";
}
}
}
?>