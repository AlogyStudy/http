<?php
	
	/**
	 * 使用 telnet 来完成POST请求
	 * 
	 * $method $url $version
	 * 请求行...
	 * 
	 * 主体内容...
	 * 
	 * POST /github/http/telnet_post.php HTTP/1.1
	 * Host: www.muchai.com
	 * Content-type: application/x-www-form-urlencoded
	 * Content-length: 33
	 * 
	 * username=chenhaizhen&color=pink 
	 *  
	 */
	/** 
POST /github/http/telnet_post.php HTTP/1.1
Host: www.muchai.com
Content-type: application/x-www-form-urlencoded
Content-length: 33
  */	
	$msg = implode("\n", $_POST);
	
	file_put_contents('./post.txt', $msg);
	
	print_r($msg);

?>