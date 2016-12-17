<?php

	set_time_limit(0);
	
	$i = 0;
	$pad = str_repeat(' ', 4000);
	ob_flush();
	flush(); // 把产生的内容立即返回给浏览器，而不要等待浏览器结束
	
	while ( $i ) {
		echo $pad;
		echo $i;	
		sleep(1);
	}

?>