<?php

	if ( !file_exists('./res.txt') ) {
		fopen('./res.txt', 'wbr');
	}
	
	$cnt = file_get_contents('./res.txt');

	$cnt += 1;
	
	file_put_contents('./res.txt', $cnt);

	// 利用HTTP协议的204特性
//	header('HTTP/1.1 204 No Conent'); // 没有内容，浏览器不理会当前文件，这次请求之后的一系列的跳转就当作没有发生.
	
?>
