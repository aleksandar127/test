<?php 


class Db {

    public static $conn;


    public function __construct(){
        if(self::$conn)
        return self::$conn; 
        $this->connect();
    }

    public function connect(){

        

        try{
            
            self::$conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8mb4', DBUSERNAME, DBPASS);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
			echo 'Database connection has failed. Contact system administrator to resolve this issue!<br>';
			$e->getMessage();
        }
	}
}
  


?>

  
 

 
 


