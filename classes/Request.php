<?php 

class Request
{
	public $get = array();
	public $post = array();
	public $parts_of_url;


	public function __construct()
	{
		$this->get_request();
		$this->post_request();
	}

//unpacking GET request 
	private function get_request()
	{
		// first part of url
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('?', $url);
		$this->parts_of_url = explode('/', $url[0]);

		//second part of url divided to get key_value pairs
		if (strpos($_SERVER['REQUEST_URI'], '?')) {
			
			$parameters = explode('&', explode('?', $_SERVER['REQUEST_URI'])[1]);
			foreach ($parameters as $key_value) {
				$parameters_parts = explode('=', $key_value);
				$this->get[$parameters_parts[0]] = $parameters_parts[1];
			}
		}

	}

//unpacking POST request
	private function post_request()
	{
		foreach ($_POST as $name => $value) {
			$this->post[$name] = $value;
		}
		
	}
}