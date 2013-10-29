<?php  
		
		session_start();
		require_once ('cvalpersonal.php');  
		require_once ('cvalemployment.php');  
		require_once ('cvalfinancial.php'); 
		require_once ('cBaseAggregator.php'); 
        require_once ('cAgg.php'); 
		require_once ('config.php');
                                
				  
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
        $a[] = new C.....();
        
        foreach( $a as $cba)
        {
            $cba->Execute();
        }
	

        session_destroy(); 
      /////////////// INSERT //////////////////////////////////////////////////////
       
     
?>
