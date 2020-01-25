<?php 

class Router
{
	private $request;
	
	public function __construct($request)
	{
	
		//
		$this->request = $request;
		$controller = new BaseAccessController($this->request);
		$method =  $this->request->parts_of_url[2];	
		
				
		if (method_exists($controller, $method)) 
			$controller->$method();	
		
		elseif(!$this->request->parts_of_url[2])
			$controller->home();
				
		else 
			var_dump('method ' . $method . ' does not exist');
		
			
		
	}	
	
}