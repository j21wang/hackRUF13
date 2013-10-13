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
		if (!move_uploaded_file($userfile, '../'.$upfile)) 
		{ 
			echo 'Problem: Could not move file to destination directory'; 
			exit; 
		} 
	} else { 
		echo 'Problem: Possible file upload attack. Filename: '.$userfile_name; 
		exit; 
	}  

exec("curl -F 'f=@/home/hack/".$upfile."' http://zxing.org/w/decode | grep 'Raw text' | awk -F 'Raw' '{print $2}' | awk -F 'margin:0\">' '{print $2}' | awk -F '</pre>' '{print $1}'", $out);


	exec("curl http://www.upcdatabase.com/item/".$out[0]." | grep -m 1 'Description' | awk -F '<td>' '{print $4}' | awk -F '</td>' '{print $1}'", $out2);
	$fulll = $out2[0];
	exec("echo ".$fulll." | awk '{print $1}'", $out3);

	session_start();
	$_SESSION['foodName']=$out3[0];
    $_SESSION['full'] = $fulll;
echo '<script> window.location.href = "http://codeniko.net/foodforsong/web/getPic.php";</script>';
 }

?>

<html>
 <head> 
        <title>Upload</title> 
        <link rel="stylesheet" type="text/css" href="upload.css" />
        <link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Averia Gruesa Libre' />
    </head> 
    <body> 
    <center>
        <div id="container">
        <h1 id="mainTitle">Food for Thought.</h1> 
        <h1 id="uploadCode">Upload a Barcode</h1> 
            <form enctype="multipart/form-data" action="getname.php" method="post"> 
                <input id="maxFile" type="hidden" name="MAX_FILE_SIZE" value="10000000"> 
                <input id="userButton" name="userfile" type="file"> 
                <input class="button" type="submit" name="submit" value="Upload"> 
            </form> 
        </div>
        <img src="../barcode.jpg">
    </center>
    </body> 
</html>
