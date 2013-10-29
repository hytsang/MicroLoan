<?php  
		//session_save_path( "/home/users/web/b46/ipg.leddsoftwarecom/cgi-bin/tmp" );
		session_start();
		require_once ('cvalpersonal.php');  
		require_once ('cvalemployment.php');  
		require_once ('cvalfinancial.php'); 
		require_once ('cBaseAggregator.php'); 
        require_once ('cLeadFlash.php'); 
		require_once ('config.php');
        
        /*try
        {
           $pdo = new PDO('mysql:host=leddsoftwarecom.ipagemysql.com;dbname=_cust1_','jpangall', '_Iwboo16_');    
        }
         catch ( PDOException $e )
        {
           echo $e->getMessage();  
        }  */                               
				  
		$valPersonal = new CValPersonalInfo();
		$valPersonal->ValidatePersonal();
	
		$valEmployment = new CValEmployment(); 
		$valEmployment->ValidateEmployment();

		$valFinancial = new CValFinancial(); 
		$valFinancial->ValidateFinancial();       
        
        $error =  $_SESSION['errors'];
        
        foreach( $error as $key=>$value)
        {
            if( $value === CSSERROR)
            {                 
                  header("Location:" . '/../gmft');  
                  return;
            }             
        }
        
        $a = array();
        $a[] = new CLeadFlash();
        
        foreach( $a as $cba)
        {
            $cba->Execute();
        }
	

        session_destroy(); 
      /////////////// INSERT //////////////////////////////////////////////////////
       
     
?>