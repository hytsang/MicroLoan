<?php 

session_start();

       
// Class supports AJAX and PHP web form validation 
class CValEmployment
{
   // constructor 
   function __construct()
   {
      
   }

   // destructor 
   function __destruct()
   {
          
   }     
  
   public function ValidateEmployment()
   {  
      $this->ValidateEmploymentInfo();		
   }  
  
   private function ValidateEmploymentInfo()
   {         
		// Validate username //////////////
		$this->ValidateEmployer();   
		
		// Validate income type ///////////
		$this->ValidateIncomeType();
		
		// Validate Employer phone //////////////////////////////
		$this->ValidateEmployerPhone();
		
		// Validate Months employed //////////////////////////////
		$this->ValidateMonthsEmployed();
		
		// Validate How often paid //////////////////////////////
		$this->ValidateHowOftenPaid();
		
		// Validate lastpaydate//////////////////////////////
		$this->ValidateLastPayDate();
		
		// Validate lastpaydate//////////////////////////////
		$this->ValidateNextPayDate();
        
        // Validate lastpaydate//////////////////////////////
        $this->ValidatePayDateAfterNext();
			
		// Validate receive pay check //////////////////////////////
		$this->ValidateHowPayCheckReceived();
		
		// Validate monthly income //////////////////////////////
		$this->ValidateMonthlyIncome();   
	}
	
		///////// Employer ////////////////////////////////////
	  private function ValidateEmployer()
	  {  
	      $val  = filter_input( INPUT_POST, 'employer', FILTER_SANITIZE_STRING  );
		
		  $_SESSION['values']['employer'] = $val;		
		  $_SESSION['errors']['employer'] = 'hidden';		  
		  
		  if ( strlen($val) == 0 || $val === false || $val === NULL )   
		  { 		
			 $_SESSION['errors']['employer'] = CSSERROR;		             			 
		  }		  	
	  }
	  ///////// End Employer ////////////////////////////////
	  
	  ///////// Income type ////////////////////////////////////
	  private function ValidateIncomeType()
	  {
           if( isset( $_POST['incometype'] ) === false ) 
           {               
               $_SESSION['incometype']['incometype'] = CSSERROR;                  
               return;
           }              
         
           $val  = filter_input( INPUT_POST, 'incometype', FILTER_SANITIZE_STRING  );     
           $a    = array_values(CSelectOptions::getIncomeTypeOptions());      
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['incometype'] = CSSERROR;    
               $_SESSION['values']['incometype'] = '';               
           }   
           else
           {
               $_SESSION['values']['incometype'] = $val;
               $_SESSION['errors']['incometype'] = 'hidden';                  
           } 		  
	  }
	  ///////// Income type ////////////////////////////////
	  
	  ///////// Employer phone ////////////////////////////////////
	  private function ValidateEmployerPhone()
	  {	       
          if( !isset($_POST['employerphone'] )  ) 
          {
              $_SESSION['errors']['employerphone'] = CSSERROR;
              return;
          } 
          
		  $val  = filter_input( INPUT_POST, 'employerphone', FILTER_SANITIZE_STRING  );	                            
		  		  
		  $_SESSION['values']['employerphone'] = $val; 		 
		 
          if( CValidator::ValidateUSPhone($val) === false)
          {
                $_SESSION['errors']['employerphone'] = CSSERROR;
                return;
          }
         
          $_SESSION['values']['employerphone'] = $val;
          $_SESSION['errors']['employerphone'] = 'hidden';  	  
	  }
	  ///////// Employer phone ////////////////////////////////
	  
	  ///////// Months employed ////////////////////////////////////
	  private function ValidateMonthsEmployed()
	  {
           if( isset( $_POST['monthsemmployed'] ) === false ) 
           {               
               $_SESSION['errors']['monthsemmployed'] = CSSERROR;                  
               return;
           }              
           
           $val  = filter_input( INPUT_POST, 'monthsemmployed', FILTER_SANITIZE_STRING  );         
           $a    = array_values(CSelectOptions::getMonthsEmmployedOptions());      
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['monthsemmployed'] = CSSERROR;    
               $_SESSION['values']['monthsemmployed'] = '';               
           }   
           else
           {
               $_SESSION['values']['monthsemmployed'] = $val;
               $_SESSION['errors']['monthsemmployed'] = 'hidden';                  
           }     
	  }
	  ///////// End Months employed ////////////////////////////////
	  
		
	   ///////// HowOftenPaid ////////////////////////////////////
	  private function ValidateHowOftenPaid()
	  {
           if( isset( $_POST['howoftenpaid'] ) === false ) 
           {               
               $_SESSION['howoftenpaid']['howoftenpaid'] = CSSERROR;                  
               return;
           }              
           
           $val  = filter_input( INPUT_POST, 'howoftenpaid', FILTER_SANITIZE_STRING  );              
           $a    = array_values(CSelectOptions::getHowOftenPaidOptions());                     
                          
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['howoftenpaid'] = CSSERROR;    
               $_SESSION['values']['howoftenpaid'] = '';               
           }   
           else
           {
               $_SESSION['values']['howoftenpaid'] = $val;
               $_SESSION['errors']['howoftenpaid'] = 'hidden';                  
           }     	  
	  }
	  ///////// End HowOftenPaid ////////////////////////////////
		
	  ///////// ValidateLastPayDate ////////////////////////////////////
	  private function ValidateLastPayDate()
	  {
          $val = trim(filter_input( INPUT_POST, 'lastpaydate', FILTER_SANITIZE_STRING ) );
			 		  
		  if( CValidator::IsValidDate($val) === false)	  
          {
              $_SESSION['errors']['lastpaydate'] = CSSERROR;    
              return;
          }
		  
		  $_SESSION['values']['lastpaydate'] = $val;		  
		  $_SESSION['errors']['lastpaydate'] = 'hidden';			            	
	  }
	  ///////// End ValidateLastPayDate ////////////////////////////////
	  
	   ///////// ValidateNextPayDate ////////////////////////////////////
	  private function ValidateNextPayDate()
	  {
          $val = trim(filter_input( INPUT_POST, 'nextpaydate', FILTER_SANITIZE_STRING ) );
			 		  
		  if( CValidator::IsValidDate($val) === false)      
          {
              $_SESSION['errors']['nextpaydate'] = CSSERROR;    
              return;
          }
          
          $_SESSION['values']['nextpaydate'] = $val;          
          $_SESSION['errors']['nextpaydate'] = 'hidden';    	
	  }
	  ///////// End ValidateNextPayDate ////////////////////////////////  	
      
      
      
        ///////// ValidatePayDateAfterNext ////////////////////////////////////
      private function ValidatePayDateAfterNext()
      {
          $val = trim(filter_input( INPUT_POST, 'paydateafternext', FILTER_SANITIZE_STRING ) ); 			 		  
		                     
          if( CValidator::IsValidDate($val) === false)      
          {
              $_SESSION['errors']['paydateafternext'] = CSSERROR;    
              return;
          }
          
          $_SESSION['values']['paydateafternext'] = $val;          
          $_SESSION['errors']['paydateafternext'] = 'hidden';       
      }
      ///////// End ValidatePayDateAfterNext //////////////////////////////// 
		
	  ///////// ValidateHowPayCheckReceived ////////////////////////////////////
	  private function ValidateHowPayCheckReceived()
	  {
           if( isset( $_POST['receivepaycheck'] ) === false ) 
           {               
               $_SESSION['receivepaycheck']['receivepaycheck'] = CSSERROR;                  
               return;
           }              
           
           $val  = filter_input( INPUT_POST, 'receivepaycheck', FILTER_SANITIZE_STRING  );  
           $a    = array_values(CSelectOptions::getHowPayCheckReceivedOptions());      
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['receivepaycheck'] = CSSERROR;    
               $_SESSION['values']['receivepaycheck'] = '';               
           }   
           else
           {
               $_SESSION['values']['receivepaycheck'] = $val;
               $_SESSION['errors']['receivepaycheck'] = 'hidden';                  
           }           	 
	  }
	  ///////// End ValidateHowPayCheckReceived ////////////////////////////////
		
		
	  ///////// Validate Monthly Income ////////////////////////////////////
	  private function ValidateMonthlyIncome()
	  {
           if( isset( $_POST['selectmonthlyincome'] ) === false ) 
           {               
               $_SESSION['selectmonthlyincome']['selectmonthlyincome'] = CSSERROR;                  
               return;
           }              
           
           $val  = filter_input( INPUT_POST, 'selectmonthlyincome', FILTER_SANITIZE_STRING  );      
           $a    = array_values(CSelectOptions::getMonthlyIncomeOptions());      
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['selectmonthlyincome'] = CSSERROR;    
               $_SESSION['values']['selectmonthlyincome'] = '';               
           }   
           else
           {
               $_SESSION['values']['selectmonthlyincome'] = $val;
               $_SESSION['errors']['selectmonthlyincome'] = 'hidden';                  
           }             
	  }
	  ///////// End Monthly Income  ////////////////////////////////
	 
}
?>
