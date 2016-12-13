<?php

	/**
	 * PHP + socket编程 ，发送HTTP请求
	 * 
	 * 模拟下载， 注册，登陆， 批量发帖
	 */
	

	// http请求类的接口
	interface Proto {
		// 连接URL
		public function conn($url);
		
		// 发送get查询
		public function get();
		
		// 发送post查询
		public function post();	
		
		// 关闭连接
		public function close();		
				
	} 

	class Http implements Proto {
		
		const CRLF = "\r\n"; // 换行信息 
		
		protected $errno = -1; // 错误编号
		protected $errstr = ''; // 错误信息
		protected $response = ''; // 响应内容 			
		
		protected $urlInfo = null; // URL信息
		protected $version = 'HTTP/1.1'; // 协议版本
		protected $fh = null; // 句柄
		
		protected $line = array(); // 请求行信息
		protected $header = array(); // 请求头信息
		protected $body = array(); // 请求主体信息
		
		
		public function __construct( $url ) {
			$this->conn($url);
			
			// 设置头信息
			$this->setHeader('Host: ' . $this->urlInfo['host']);
		}
		
		/**
		 * 设置请求行
		 * @param {Stinrg} $method 请求方法 默认GET
		 */
		protected function setLine( $method ) {
			$this->line[0] = $method . '  ' . $this->urlInfo['path'] . ' ' . $this->version;
		}
		
		/**
		 * 声明头信息
		 * @param {String} $headerline 头信息
		 */
		protected function setHeader( $headerline ) {
			$this->header[] = $headerline; 
		}
			
		/**
		 * 写主体信息
		 * @param {Array} $body 设置body信息
		 */	
		protected function setBody( $body ) {
			$this->body[] = http_build_query($body);			
		} 
		
		/**
		 * 连接URL
		 * @param {String} $url 连接的URL
		 */
		public function conn( $url ) {
			// 分析URL
			$this->urlInfo = parse_url($url);
			
			// 判断端口
			$this->urlInfo['port'] = isset($this->urlInfo['port']) && $this->urlInfo['port'] == 80 ? $this->urlInfo['port'] : 80; 
			
			// 连接
			$this->fh = fsockopen($this->urlInfo['host'], $this->urlInfo['port'], $this->errno, $this->errstr, 3);
			
		}
		
		/**
		 * 构造get查询
		 */
		public function get() {
			$this->setLine('GET');
			
			$this->request();
			return $this->response;
		} 
		
		
		/**
		 * 请求get数据
		 * 请求POST数据
		 */
		public function request() {
			// 拼接请求信息
			$req = array_merge($this->line, $this->header, array(''), $this->body, array(''));
			$req = implode(self::CRLF, $req);
			echo $req;
			
			// 写
			fwrite($this->fh, $req);
			
			// 读取
			while ( !feof($this->fh) ) {
				$this->response .= fread($this->fh, 1024); 
			}
			// 关闭连接
			$this->close();
		} 
		
		/**
		 * 构造post查询
		 * @param {Array} $body body 的信息
		 * 	 
		 */
		/**
		 * POST / HTTP/1.1
				Host: linxingzhang.com
				Content-type: application/x-www-form-urlencoded
				Content-length: 20
				username=chenhaizhen
		 */ 
		 
		public function post( $body=array() ) {
			
			// 设置请求行
			$this->setLine('POST');
			
			// 构造主体信息
			$this->setBody($body);
			
			// 设置 Content-type 和  计算Content-length
			$this->setHeader('Content-type: application/x-www-form-urlencoded');
			$this->setHeader('Content-length: ' . strlen($this->body[0]));
			
			$this->request();
			return $this->response;
			
		} 
		
		/**
		 * 关闭连接
		 */
		public function close() {
			fclose($this->fh);
		} 
		
	}

//	$url = 'http://luqi.baijia.baidu.com/article/719576';
	$url = 'http://www.linxingzhang.com/index.php';
	$http = new Http($url);
//	echo $http->get();
	$http->post(array('tit' => 'xixi', 'con' => 'pink'));
	
	
?>
