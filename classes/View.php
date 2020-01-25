<?php 

class View
{
	
	public $data = array();

		//function for loading views
	public function load_view($file_name)
	{
		require('./views/'.$file_name.'.php');
				
	}
}