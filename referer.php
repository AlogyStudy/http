<?php

	require('./http.class.php');
	
	$http = new Http('http://linxingzhang.com/blog/img/weixin.jpg');
	
	$http->setHeader('Referer: http://www.muchai.com');
	$res = $http->get();
	
	file_put_contents('./xixi.jpg', substr(strstr($res, "\r\n\r\n"), 4));
	
	echo 'ok';
	
?>