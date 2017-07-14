<?php
//Save your bandwidth and import files with High speed connection to your server
set_time_limit(0); //Unlimited max execution time
 
$path = 'wordpress.zip';
$url = 'https://wordpress.org/latest.zip';
$newfname = $path; 
echo 'Starting Download!<br>';
$file = fopen ($url, "rb");
$i=1;
if($file) {
	$newf = fopen ($newfname, "wb");
	if($newf)
		while(!feof($file)) {
			fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
			echo '1 MB File Chunk Written!<br>';
			$i++;
		}
}
if($file) {
	fclose($file);
}
if($newf) {
	fclose($newf);
}
echo 'Finished! near '.$i.'MB';
?>
