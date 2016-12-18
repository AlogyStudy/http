<?php

	set_time_limit(0);
	
	ob_start();
	
	$pad = str_repeat(' ', 4000);
	echo $pad, '<br />';
	ob_flush();
	flush(); // 把产生的内容立即返回给浏览器，而不要等待浏览器结束
 	
 	$conn = mysql_connect('localhost', 'root', '');
	mysql_query('use mm');
 	
	while ( true ) {
		
		$sql = "select * from mm_msg where flag=0";
		$rs = mysql_query($sql, $conn);
		
		$row = mysql_fetch_assoc($rs);
		
		if ( !empty($row) ) {
			echo $pad, '<br />';
			echo $row['connent'], '<br />';
			
			// 设置已读
			$sql = "update mm_msg set flag = 1";
			mysql_query($sql);
			
			ob_flush();
			flush(); // 把产生的内容立即返回给浏览器，而不要等待浏览器结束
		}
			
		sleep(1);
	}
	
	/**
	 * 如果 while不是 1， 2,3  内容.
	 * 而是数据库中的内容，
	 * 如果是2个人的聊天记录.
	 * 
	 * 即时通信.
	 * 
	 * 服务器端不间断，推送信息. 到客户端.
	 */
	 
?>