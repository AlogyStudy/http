<?php
	
//	print_r($_POST);
	
	file_put_contents('./upfile.txt', $_POST);
	
	echo '上传成功';

?>