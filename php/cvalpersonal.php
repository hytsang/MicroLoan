<?php 

session_start();
require_once ('Validator.php');
require_once ('cSelectOptions.php');

// Class supports AJAX and PHP web form validation 
class CValPersonalInfo
{
   // constructor 
   function __construct()
   {
    
   }

   // destructor 
   function __destruct()
   {
          
   }     
  
   public function ValidatePersonal()
   {    
	 if (isset($_SESSION['errors']))
	 {
	 	unset($_SESSION['errors']);
	 }
 
	 $this->ValidatePersonalInfoValues();	
   }
  
  
   private function ValidatePersonalInfoValues()
   { 
  
		// Validate username ////////
		$this->ValidateBankAct();
		
		// Validate IsMilitary //////
		$this->ValidateIsMilitary();
		
		$this->ValidateLoanAmount();
			
		// Validate First Name //////
		$this->ValidateFirstName();		
		
		// Validate Last Name ///////
		$this->ValidateLastName();
		
		// Validate Address ////////
		$this->ValidateAddress();    
		
		// City  ///////////////////
		$this->ValidateCity();
	   
		// State //////////////////
		$this->ValidateState();
			
		// Zip ////////////////////
		$this->ValidateZip();
	   
		// Time at address /////////////
		$this->ValidateTimeAtAddress();
			
		// Phone //////////////////////
		$this->ValidatePhone();
			
		// Best time to call ///////////
		$this->ValidateBestTimeToCall();    

		// Email ///////////////////////
		$this->ValidateEmail();
		
		// Verify Email ///////////////
		$this->ValidateVerifyEmail();
		
		$this->ValidateDOB();
		
		// SS ////////////////////////////
		$this->ValidateSociallSecurity();
			
		// Driver's license or State Id //
		$this->ValidateStateId();
		
		// Id State //////////////////////
		$this->ValidateIdState();
		
		// Is home owner /////////////////
		$this->ValidateIsHomeOwner();		

	
	} // End ValidatePersonalInfoValues
	
	
	  ///////// Bank account selection is required. 
	  private function ValidateBankAct()
	  {	   
		   if( isset( $_POST['bankAct'] ) === false ) 
		   {		       
		       $_SESSION['errors']['bankAct'] = CSSERROR;	               			   
			   return;
		   }   		
           
           $val  = trim( filter_input( INPUT_POST, 'bankAct', FILTER_SANITIZE_STRING  ) );  		   
		           
		   $a    = array_values(CSelectOptions::getYesNoOptions());      
           
           if( in_array( $val,$a) === false )     		
           {
               $_SESSION['errors']['bankAct'] = CSSERROR;    
               $_SESSION['values']['bankAct'] = '';           			   
           }   
		   else
		   {
		       $_SESSION['values']['bankAct'] = $val;
               $_SESSION['errors']['bankAct'] = 'hidden';				   
		   }		 		 
	  }
	  ///////// End Bank account selection is required. 
	  
	  ///////// Is military selection is required. 
	  private function ValidateIsMilitary()
	  {
	       if( isset( $_POST['ismilitary'] ) === false ) 
		   {		       
		       $_SESSION['errors']['ismilitary'] = CSSERROR;	
			   return;
		   }   		   
           
           $val  = trim( filter_input( INPUT_POST, 'ismilitary', FILTER_SANITIZE_STRING  ) ); 		   
		  
		   $a   =  array_values(CSelectOptions:: getYesNoOptions());   
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['ismilitary'] = CSSERROR;    
               $_SESSION['values']['ismilitary'] = '';                          
           }   
           else
           {
               $_SESSION['values']['ismilitary'] = $val;
               $_SESSION['errors']['ismilitary'] = 'hidden';                   
           }    
	  }
	  ///////// End s military selection is required. 
	  
	  ///////// Loan amount. 
	  private function ValidateLoanAmount()
	  {
	       if( isset( $_POST['loanamount'] ) === false ) 
		   {		       
		       $_SESSION['errors']['loanamount'] = CSSERROR;	
			   return;
		   }
           
           $val  = trim( filter_input( INPUT_POST, 'loanamount', FILTER_SANITIZE_STRING  ) );
           	   
		   $a   =  array_values(CSelectOptions:: getLoanAmountOptions());        
             
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['loanamount'] = CSSERROR;    
               $_SESSION['values']['loanamount'] = '';                          
           }   
           else
           {
               $_SESSION['values']['loanamount'] = $val;
               $_SESSION['errors']['loanamount'] = 'hidden';                   
           }           		   		  
	  }
	  ///////// End Loan amount. 
	  
	  ///////// First Name ///////////////////
	  private function ValidateFirstName()
	  {     	
          if(!isset( $_POST['fname']) )
          {
                $_SESSION['errors']['fname'] = CSSERROR;
                return;
          }
          
          $val = $_POST['fname'];
          if( CValidator::ValidateName($val) === false)
          {
                $_SESSION['errors']['fname'] = CSSERROR;
                return;
          }          
		   
          // $reg = "/^[a-zA-Z]+$/";
          // $ff  = preg_match($reg,$val);
            
		  $_SESSION['values']['fname'] = $val;
		  $_SESSION['errors']['fname'] = 'hidden';   
	  }	  
	  ///////// End First Name ///////////////////
	  
	  ///////// Last Name ///////////////////
	  private function ValidateLastName()
	  {
          if(!isset( $_POST['lname']) )
          {
                $_SESSION['errors']['lname'] = CSSERROR;
                return;
          }
          
          $val = $_POST['lname'];
          if( CValidator::ValidateName($val) === false)
          {
                $_SESSION['errors']['lname'] = CSSERROR;
                return;
          }           
            
          $_SESSION['values']['lname'] = $val;
          $_SESSION['errors']['lname'] = 'hidden';    
	  }
	  ///////// End Last Name ///////////////////
	  
	  ///////// Address ///////////////////
	  private function ValidateAddress()
	  {	 
		  $val  = filter_input( INPUT_POST, 'address', FILTER_SANITIZE_STRING  );    
          $val  = trim($val);           
		    		 
		  $_SESSION['values']['address'] = $val;	
		  		  
		  /*if( ctype_alnum($val) === false)
		  {
			  $_SESSION['errors']['address'] = CSSERROR;		
              return;	
		  }		   */
		  
		  if( strlen($val) === 0 || $val === 0 || $val === NULL) 
		  {             
			  $_SESSION['errors']['address'] = CSSERROR;		
              return;			  
		  }	  
          
          $_SESSION['errors']['address'] = 'hidden';
	  }
	  ///////// End Address ///////////////////
	  
	   ///////// City ///////////////////
	  private function ValidateCity()
	  {
	      $val = filter_input( INPUT_POST, 'city', FILTER_SANITIZE_STRING  );
		  		  
		  $_SESSION['values']['city']  = $val;            
		  		
		  // letters only - no numbers.
		  if( ctype_alnum ($val) === false)
		  {
		       $_SESSION['errors']['city'] = CSSERROR;
			   return;		       
		  }			  
		  
		  if( strlen($val) === 0 || $val === false || $val === NULL) 
		  { 		
			  $_SESSION['errors']['city'] = CSSERROR;	
              return;			 
		  }	
          
          $_SESSION['errors']['city'] = 'hidden';
	  }
	  ///////// End City ///////////////////
	  
	   ///////// State ///////////////////
	  private function ValidateState()
	  {
	       if( isset( $_POST['state'] ) === false ) 
		   {		       
		       $_SESSION['errors']['state'] = CSSERROR;	
			   return;
		   }
		   
		   $val = $_POST['state']; 		   		  
		   $a   =  array_values(CSelectOptions::getStateOptions());               
            
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['state'] = CSSERROR;    
               $_SESSION['values']['state'] = '';                          
           }   
           else
           {
               $_SESSION['values']['state'] = $val;
               $_SESSION['errors']['state'] = 'hidden';                   
           }  		   	  
	  }
	  ///////// End State ///////////////////
	  
	   ///////// Zip ///////////////////
	  private function ValidateZip()
	  {         
          if( !isset( $_POST['zip']) )    
          {
              $_SESSION['errors']['zip'] = CSSERROR;
              return;
          }
          
          $val = $_POST['zip'];
		  $_SESSION['values']['zip'] = $val; 
          
          if( CValidator::ValidateUSZip($val) === false)
          {
                $_SESSION['errors']['zip'] = CSSERROR;
                return;
          }
        		 
		  $_SESSION['errors']['zip'] = 'hidden';
		         
	  }
	  ///////// End Zip ///////////////////
	  
	  ///////// Time at address ///////////////////
	  private function ValidateTimeAtAddress()
	  {
	       if( isset( $_POST['timeataddress'] ) === false ) 
		   {		       
		       $_SESSION['errors']['timeataddress'] = CSSERROR;				  
			   return;
		   }
		  		  
		   $val = $_POST['timeataddress'];	  
		   $a   =  array_values(CSelectOptions:: getTimeAtAddressOptions());   
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['timeataddress'] = CSSERROR;    
               $_SESSION['values']['timeataddress'] = '';                          
           }   
           else
           {
               $_SESSION['values']['timeataddress'] = $val;
               $_SESSION['errors']['timeataddress'] = 'hidden';                   
           }        		   		 	 	      
	  }
	  ///////// End Time at address ///////////////////
	  
	  private function ValidatePhone()
	  {    
          $val  = filter_input( INPUT_POST, 'phone', FILTER_SANITIZE_STRING  );
		  $_SESSION['values']['phone'] = $val;
		  
          if( !isset($_POST['phone'] )  ) 
          {
              $_SESSION['errors']['phone'] = CSSERROR;
              return;
          } 
         	  	 
          if( CValidator::ValidateUSPhone($val) === false)
          {
                $_SESSION['errors']['phone'] = CSSERROR;
                return;
          }
           
		  $_SESSION['values']['phone'] = $val;	
          $_SESSION['errors']['phone'] = 'hidden';	  
	  }
	  
	   ///////// Best time to call //////////////////////
	  private function ValidateBestTimeToCall()
	  {
	       if( isset( $_POST['besttime'] ) === false ) 
		   {		       
		       $_SESSION['errors']['besttime'] = CSSERROR;               		   
			   return;
		   }
				
		   $val = $_POST['besttime'];	  
		   $a   =  array_values(CSelectOptions:: getBestTimeToCallOptions());          
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['besttime'] = CSSERROR;    
               $_SESSION['values']['besttime'] = '';                          
           }   
           else
           {
               $_SESSION['values']['besttime'] = $val;
               $_SESSION['errors']['besttime'] = 'hidden';                   
           }  		   	          
	  }
	  ///////// End Best time to call ///////////////////
	  
	  
	  
	  ////////// Email  ////////////////////////////////
	  private function ValidateEmail()
	  {		
          if( !isset( $_POST['email']  ) ) 
          {               
              $_SESSION['errors']['email'] = CSSERROR;                          
              return;
          }        
          
          $val  = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL  );  
          $_SESSION['values']['email'] = $val;    
          
          if( CValidator::ValidateEmail($val) === false)
          {
              $_SESSION['errors']['dateofbirth'] = CSSERROR;                          
              return;
          }            
          
          $_SESSION['values']['email'] = $val;  
          $_SESSION['errors']['email'] = 'hidden';         
	  }
	  ///////// Email /////////////////////////////////
	  
	  ////////// Verify Email  ////////////////////////////////
	  private function ValidateVerifyEmail()
	  {
		  $val  = filter_input( INPUT_POST, 'verifyemail', FILTER_SANITIZE_EMAIL  );	
          $val2 = filter_var( $val, FILTER_VALIDATE_EMAIL);
		  
		  $_SESSION['values']['verifyemail'] = $val2;
		  		  
		  if( $val2  === false  )
		  {
			  $_SESSION['errors']['verifyemail'] = CSSERROR;
			  return;
		  }	  
		  
		  if( $val2 !== $_SESSION['values']['email'] )
		  {
			  $_SESSION['errors']['verifyemail'] = CSSERROR;
			  return;
		  }     	
          
          $_SESSION['errors']['verifyemail'] = 'hidden';   
	  }
	  ///////// End Verify Email /////////////////////////////////
	  
	   ////////// Verify DOB  ////////////////////////////////
	  private function ValidateDOB()
	  {
	      if( !isset( $_POST['dateofbirth']  ) ) 
		  {		       
		      $_SESSION['errors']['dateofbirth'] = CSSERROR;               		   
		      return;
		  }   		 
		 
		 $date  = filter_input( INPUT_POST, 'dateofbirth', FILTER_SANITIZE_STRING  );
         
         $_SESSION['values']['dateofbirth']  = $date;
         
         if( CValidator::ValidateDOB($date) === false)
         {
              $_SESSION['errors']['dateofbirth'] = CSSERROR;                          
              return;
         }
						 
		 $_SESSION['values']['dateofbirth']  = $date;
		 $_SESSION['errors']['dateofbirth'] = 'hidden';   
			     
	  }
	  ///////// End DOB /////////////////////////////////
	  
	  
	  ////////// Verify SS  ////////////////////////////////
	  private function ValidateSociallSecurity()
	  {
		 $val  = filter_input( INPUT_POST, 'ssn', FILTER_SANITIZE_STRING  );          
        		 
		 $_SESSION['values']['ssn'] = $val;
		 
		 if ( isset( $_POST['ssn'] ) === false )
		 {
			$_SESSION['errors']['ssn'] = CSSERROR;
			return;
		 }	
         
         if( CValidator::ValidateSociallSecurity($val) === false)
         {
              $_SESSION['errors']['ssn'] = CSSERROR;                          
              return;
         }   
         
         $_SESSION['values']['ssn'] = $val;		 
         return true;
	  }
	  ///////// End SS /////////////////////////////////
	  
	  
	   ////////// Verify Driver's license or state id /////////
	  private function ValidateStateId()
	  {
		  $val  = filter_input( INPUT_POST, 'stateid', FILTER_SANITIZE_STRING  );
         
		  CValidator::StringFilter($val);	
                		 
		  $_SESSION['values']['stateid'] = $val;			  
		  
		  if( strlen($val) === 0 || $val === 0 || $val === false) 
		  {             
			  $_SESSION['errors']['stateid'] = CSSERROR;	
              return;			  
		  }		
          
          $_SESSION['errors']['stateid'] = 'hidden'; 	  
	  }
	  ///////// End Driver's license or state id//////////////
	  
	  ////////// Verify Id State  ////////////////////////////////
	  private function ValidateIdState()
	  {
	       if( isset( $_POST['idstate'] ) === false ) 
		   {		       
		       $_SESSION['errors']['idstate'] = CSSERROR;               		   
			   return;
		   }
		   		   
		   $val = $_POST['idstate'];	  
		   $a   =  array_values(CSelectOptions::getStateOptions());           
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['idstate'] = CSSERROR;    
               $_SESSION['values']['idstate'] = '';                          
           }   
           else
           {
               $_SESSION['values']['idstate'] = $val;
               $_SESSION['errors']['idstate'] = 'hidden';                   
           } 		   		 	   	 
	  }
	  ///////// End Id State /////////////////////////////////
	  
	  ////////// Verify Is homeowner  ////////////////////////////////
	  private function ValidateIsHomeOwner()
	  {
	       if( isset( $_POST['homeowner'] ) === false ) 
		   {		       
		       $_SESSION['errors']['homeowner'] = CSSERROR;               		   
			   return;
		   }
		   
		   $val = $_POST['homeowner'];	  
		   $a   =  array_values(CSelectOptions::getYesNoOptions());     
           
           if( in_array( $val,$a) === false )             
           {
               $_SESSION['errors']['homeowner'] = CSSERROR;    
               $_SESSION['values']['homeowner'] = '';                          
           }   
           else
           {
               $_SESSION['values']['homeowner'] = $val;
               $_SESSION['errors']['homeowner'] = 'hidden';                   
           }       		     		
	  }
	  ///////// End Is homeowner /////////////////////////////////
	
}
?>
