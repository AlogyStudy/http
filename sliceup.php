<?php

	// 接收文件，并合并
	
	var_dump($_FILES);
	
	// 文件是否存在
	if ( !file_exists('up.avi') ) {
		move_uploaded_file($_FILES['part']['tmp_name'], './upload/up.avi');
	} else {
		// 存在文件合并
		file_put_contents('./upload/up.avi', file_get_contents($_FILES['part']['tmp_name']), FILE_APPEND);
	}

	echo 'ok';
	
?>