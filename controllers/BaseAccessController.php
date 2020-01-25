<?php 


class BaseAccessController 
{	
	private $request;

    //request prop is Request object now
	public function __construct(Request $request)
	{
       
       $this->request=$request;

	}
	//show home view
	public function home()
	{
		$view = new View();
		$view->load_view('home');
	}
    //method for sanitize user input 
	private function sanitize($input)
	{
		return htmlspecialchars(strip_tags(trim($input)));
	}
	
	//show form for login
	public function loginform()
	{
		$view = new View();
		$view->load_view('login');
	}

	//method for login user
	public function login()
	{   
		$email = $this->sanitize($this->request->post['email']);
		$password = $this->sanitize($this->request->post['password']);
		$user=User::login($email,$password);
		
		$view = new View();
		if($user){
			$view->data['msg']='Welcome '.$user;
			$_SESSION['logged']=true;
		}
		else
			$view->data['msg']='Error logging you in';

		$view->load_view('login');
	}

    //logout method
	public function logout()
	{

		session_destroy();
		$view = new View();
		$view->data['msg']='You have successfully logged out!';
		$view->load_view('login');
		
	}

    //show form for registration
	public function registerform()
	{
		$view = new View();
		$view->load_view('register');
	}

	//logic for user registration
	public function register()
	{
		//sanitaze input
		$email = $this->sanitize($this->request->post['email']);
		$password = $this->sanitize($this->request->post['password']);
		$name =$this->sanitize($this->request->post['name']);
		$re_password =$this->sanitize($this->request->post['re_password']);
		$view = new View();

		//validate input
		if ($email=='' || $password=='' || $name=='' || $re_password=='')
			$view->data['msg'][] = 'all fields must be filled!';
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			$view->data['msg'][] = 'email is not valid!';
		if (!preg_match("/^[a-zA-Z]*$/",$name) || strlen($name)<2) 
			$view->data['msg'][] = "Only letters allowed for name(2 minimum)";
		if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password)===0)
			$view->data['msg'] []=  'Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit';
		if($password!==$re_password)
			$view->data['msg'] []='password and re_password must match';
		  
		if(!isset($view->data['msg'])){
			$user=new User($name,$email,$password);

        //check if user exist in database
		if(User::userExist($user->email)){
			$view->data['msg'][] = 'this email is already in use!';
		    $view->load_view('register');
			exit();
		}
		//save user
		$saved=$user->save();
		if($saved)
			$view->data['msg'][] = 'Successful registration!';
		else
			$view->data['msg'][] = 'Unexpected error,try again!';  
	}  	
		
		$view->load_view('register');
	} 
	
    //show results for search 
	public function resultscreen()
	{
		
		$view = new View();
		if(!isset($_SESSION['logged'])){
			$view->data['msg']='Please,login first';
			$view->load_view('login');
			exit();
		}

		$name=$this->sanitize($this->request->post['search']);
        $users=User::all($name);
		$view->data['users'] = $users;
		$view->load_view('resultscreen');
	}
	
	
	
}
