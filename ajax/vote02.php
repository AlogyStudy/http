<?php

	if ( !file_exists('./res.txt') ) {
		fopen('./res.txt', 'wbr');
	}
	
	if ( rand(1, 10) < 4 ) {
		echo 0; // 投票失败
	} else {
		$cnt = file_get_contents('./res.txt');
	
		$cnt += 1;
		
		$res = file_put_contents('./res.txt', $cnt);
	
		echo 1; // 投票成功
	}
	
	
?>
