<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

echo "hi";

if ($_POST['file'])
{
	require_once('RecognizeImAPI.php');
	// $file is where file went on webserver 
	$file = $HTTP_POST_FILES['file']['tmp_name']; 
	// $file_name is original file name 
	$file_name = $HTTP_POST_FILES['file']['name']; 
	// $file_size is size in bytes 
	$file_size = $HTTP_POST_FILES['file']['size']; 
	// $file_type is mime type e.g. image/gif 
	$file_type = $HTTP_POST_FILES['file']['type']; 
	// $file_error is any error encountered 
	$file_error = $HTTP_POST_FILES['file']['error']; 



	$saveLocation = './'$file_name; 

	// is_uploaded_file and move_uploaded_file 
	if (is_uploaded_file($file)) 
	{ 
		if (!move_uploaded_file($file, $saveLocation)) 
		{ 
			echo 'Problem: Could not move file to destination directory'; 
			exit; 
		} 
	} else { 
		echo 'Problem: Possible file upload attack. Filename: '.$file_name; 
		exit; 
	} 


$imagePath = $file_name;
$mode = 'single';

if ($mode == 'single') {
	if (RecognizeImAPI::checkImageLimits($imagePath, $mode)) {
		$singleOneResult = RecognizeImAPI::recognize(file_get_contents($imagePath), $mode);
		$singleAllResults = RecognizeImAPI::recognize(file_get_contents($imagePath), $mode, TRUE);
	} else {
		echo "Image does not fulfill the requirements.\n";
	}
} else if ($mode == 'multi') {
	if (RecognizeImAPI::checkImageLimits($imagePath, $mode)) {
		$multiOneInstance = RecognizeImAPI::recognize(file_get_contents($imagePath), $mode);
		$multiAllInstances = RecognizeImAPI::recognize(file_get_contents($imagePath), $mode, TRUE);
		var_dump($multiOneInstance);
		var_dump($multiAllInstances);
	} else {
		echo "Image does not fulfill the requirements.\n";
	}
} else {
	echo "Wrong recognition mode.\n";
}



}
//$imageList = RecognizeImAPI::imageList();

?>

<!doctype html>
<html>
	<head>
	</head>
	<body>

		<hr>
		<?php
		if ($_POST['file']))
		{
			var_dump($singleOneResult);
			var_dump($singleAllResults);
		}
		?>
	</body>
</html>
<?php echo "hi"; ?>
