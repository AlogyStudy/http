<?php

	require('./http.class.php');
	
	// content
	$url = 'http://w.coral.qq.com/article/comment/';
	
	$msg = array(
		'targetid' => 1665529109,
		'type' => 1,
		'format' => 'SCRIPT',
		'callback' => 'parent.topCallback',
		'content' => 'backbone',
		'_method' => 'put',
		'g_tk' => 1437957853,
		'code' => 1,
		'source' => 1,
		'subsource' => 0,
		'picture' => '' 	
	);
	
	set_time_limit(0); 
	
	$http = new Http($url);
	
	// 模拟头信息 
	$http->setHeader('cookie: ptui_loginuin=1129507496@qq.com; pt2gguin=o1129507496; uin=o1129507496; skey=@eHnHS7nT1; ptisp=ctc; RK=9gcWWrSXMK; ptcz=ad2886a1a4a2008cdf953cee396e4c18542dd5667d055f98c1cc7363fc1973ff; pac_uid=1_1129507496; o_cookie=1129507496; pgv_info=ssid=s595782189; pgv_pvid=6186477584; uid=324803742');
	$http->setHeader('Referer: http://www.qq.com/coral/coralBeta3/coralMainDom3.0.htm');
	$http->setHeader('Upgrade-Insecure-Requests:1');
	$http->setHeader('User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36');
	
//	echo $http->post( $msg );
	
	file_put_contents('./res.html', $http->post( $msg ));
	echo 'ook';
	
?>