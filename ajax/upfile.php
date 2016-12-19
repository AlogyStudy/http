<?php
	
//	print_r($_POST);
	
	if ( !empty($_POST) ) {
		file_put_contents('./upfile.txt', $_POST);
		echo '上传成功';
	} else {
		echo '失败';
	}
	

?>