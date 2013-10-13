<?php 
if ($_POST['submit']) {
// $userfile is where file went on webserver 
$userfile = $_FILES['userfile']['tmp_name']; 
// $userfile_name is original file name 
$userfile_name = $_FILES['userfile']['name']; 
// $userfile_size is size in bytes 
$userfile_size = $_FILES['userfile']['size']; 
// $userfile_type is mime type e.g. image/gif 
$userfile_type = $_FILES['userfile']['type']; 
// $userfile_error is any error encountered 
$userfile_error = $_FILES['userfile']['error']; 

// userfile_error was introduced at PHP 4.2.0 
// use this code with newer versions 

if ($userfile_error > 0) { 
echo 'Problem: '; 
switch ($userfile_error) 
{ case 1: 
echo 'File exceeded upload_max_filesize'; 
break; 
case 2: 
echo 'File exceeded max_file_size'; 
break; 
case 3: 
echo 'File only partially uploaded'; 
break; 
case 4: 
echo 'No file uploaded'; 
break; 
} 
exit; 
} 

// put the file where we'd like it 
$upfile = 'uploads/'.$userfile_name; 

// is_uploaded_file and move_uploaded_file 
if (is_uploaded_file($userfile)) 
{ 
if (!move_uploaded_file($userfile, $upfile)) 
{ 
echo 'Problem: Could not move file to destination directory'; 
exit; 
} 
} else { 
echo 'Problem: Possible file upload attack. Filename: '.$userfile_name; 
exit; 
} 
echo 'File uploaded successfully<br /><br />'; 

// show what was uploaded 
echo 'Preview of uploaded file contents:<br /><hr />'; 
echo $contents; 
echo '<br /><hr />'; 
}
?>



<html> 
<head> 
<title>Upload</title> 
</head> 
<body> 
<h1>Upload</h1> 
<form enctype="multipart/form-data" action="upload.php" method="post"> 
<input type="hidden" name="MAX_FILE_SIZE" value="10000000"> File: 
<input name="userfile" type="file"> 
<input type="submit" name="submit" value="Upload"> 
</form> 
</body> 
</html> 
