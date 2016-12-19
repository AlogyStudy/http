<?php

	if ( empty($_FILES) ) {
		exit('no file');		
	} 
	
	$error = $_FILES['pic']['error'] == 0 ? 'success' : 'fail';
	
	sleep(2);
	
	if ( $error == 0 ) {
		echo '<script>
			parent.document.getElementById("msg").innerHTML = "'. $error .'"
		</script>';
	} else {
		echo '上传失败';
	}
	

?>