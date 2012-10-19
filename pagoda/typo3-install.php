<?php
/*
	TYPO3 v4.7.5
	
	cURL Installer for Pagoda Box v1.06
	Copyright 2012 by Martin Zeitler
	http://codefx.biz/contact
*/

/* the environment */
$fn='introductionpackage-4.7.5.zip';
$wd='pagoda/introductionpackage-4.7.5/';
$src='http://sourceforge.net/projects/typo3/files/latest/download?source=files';
$base_dir = str_replace('/pagoda','', dirname(__FILE__));
$hostname=$_SERVER['APP_NAME'].'.pagodabox.com';
$dst=$base_dir.'/pagoda/'.$fn;

/* fetch the package */
wget($src, $dst);

/* extract the package */
$zip = new ZipArchive;
if($zip->open($dst) === TRUE) {
	$zip->extractTo(dirname(__FILE__));
	$zip->close();
}

mkdir('pagoda/introduction');
unlink($wd.'.htaccess');
rename($wd.'_.htaccess', '.htaccess');
fix_syntax();

echo 'TYPO3 v4.7.5 will now be deployed.';

function wget($src, $dst){
	$fp = fopen($dst, 'w');
	$curl = curl_init();
	$opt = array(
		CURLOPT_URL => $src,
		CURLOPT_HEADER => false,
		CURLOPT_FILE => $fp,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_MAXREDIRS => 5
	);
	curl_setopt_array($curl, $opt);
	$rsp = curl_exec($curl);
	if($rsp===false){
		die("[cURL] errno:".curl_errno($curl)."\n[cURL] error:".curl_error($curl)."\n");
	}
	$info = curl_getinfo($curl);
	curl_close($curl);
	fclose($fp);
	
	/* cURL stats */
	$time = $info['total_time']-$info['namelookup_time']-$info['connect_time']-$info['pretransfer_time']-$info['starttransfer_time']-$info['redirect_time'];
	echo "Fetched '$src' @ ".abs(round(($info['size_download']*8/$time/1024/1024),2))."MBit/s.\n";
}

function fix_syntax(){
	
	global $wd;
	$files=array(
		't3lib/cache/backend/resources/dbbackend-layout-cache.sql',
		't3lib/cache/backend/resources/dbbackend-layout-tags.sql',
		't3lib/stddb/tables.sql',
		'typo3/sysext/cms/ext_tables.sql',
		'typo3/sysext/indexed_search/ext_tables.sql',
		'typo3/sysext/openid/ext_tables.sql',
		'typo3/sysext/openid/lib/php-openid/Auth/OpenID/MySQLStore.php',
		'typo3conf/ext/introduction/Resources/Private/Subpackages/Introduction/Database/introduction.sql'
	);
	
	foreach($files as $file) {
		$contents = file_get_contents($wd.$file);
		file_put_contents($wd.$filename, preg_replace('/\sENGINE=InnoDB/','',$contents));
		echo basename($file).' has been patched.';
	}
}

function format_size($size=0) {
	if($size < 1024){
		return $size.'b';
	}
	elseif($size < 1048576){
		return round($size/1024,2).'kb';
	}
	else {
		return round($size/1048576,2).'mb';
	}
}
?>