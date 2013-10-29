<?php 
session_save_path( "/home/users/web/b46/ipg.leddsoftwarecom/cgi-bin/tmp" );
session_start();

// Class supports AJAX and PHP web form validation 
class CValFinancial
{
   // constructor 
   function __construct()
   {      
   }

   // destructor 
   function __destruct()
   {          
   }     
  
   public function ValidateFinancial()
   {  
      $this->ValidateFinancialInfo();		
   }  
  
   private function ValidateFinancialInfo()
   {   
		
		// Validate account type //////////////////////////////
		$this->ValidateAccountType();	
				
		// Validate MonthsWithBank //////////////////////////////
		$this->ValidateMonthsWithBank();
			
		// Validate routingnumber //////////////////////////////
		$var = $this->ValidateRoutingNumber();		
		
		// Validate routingnumber //////////////////////////////
		$this->ValidateBankAccountNumber();
		
		// Validate bank name //////////////////////////////
		$this->ValidateBankName();
		
		// Validate bank phone //////////////////////////////
		$this->ValidateBankPhone();		
  } 
  
	 ///////// Account type ////////////////////////////////////
	  private function ValidateAccountType()
	  {	               
           if( isset( $_POST['accounttype'] ) === false ) 
           {                          
               return;
           }              
           
           $val  = $_POST['accounttype'];
           $a    = array_values(CSelectOptions::getAccountOptions());      
           
           if( in_array( $val,$a ) === true )             
           {
                $_SESSION['values']['accounttype'] = $val;
                $_SESSION['errors']['accounttype'] = 'hidden';             
           } 
           else
           {
                $_SESSION['errors']['accounttype'] = CSSERROR;    
                $_SESSION['values']['accounttype'] = ''; 
           }             		  
	  }
	  ///////// End account type ////////////////////////////////
	  
	  ///////// MonthsWithBank ////////////////////////////////////
	  private function ValidateMonthsWithBank()
	  {
           if( isset( $_POST['monthswithbank'] ) === false ) 
           {                          
               return;
           }              
           
           $val  = $_POST['monthswithbank'];      
           $a    = array_values(CSelectOptions::getMonthsWithBankOtions());      
           
           if( in_array( $val,$a ) === true )             
           {
                $_SESSION['values']['monthswithbank'] = $val;
                $_SESSION['errors']['monthswithbank'] = 'hidden';             
           } 
           else
           {
                $_SESSION['errors']['monthswithbank'] = CSSERROR;    
                $_SESSION['values']['monthswithbank'] = ''; 
           }          	
	  }
	  ///////// End MonthsWithBank ////////////////////////////////
	  
	  ///////// RoutingNumber ////////////////////////////////////
	  private function ValidateRoutingNumber()
	  {
		  $val  = filter_input( INPUT_POST, 'routingnumber', FILTER_SANITIZE_NUMBER_INT  );    
          //$val = filter_var($val, FILTER_VALIDATE_INT  );      
          
          $_SESSION['values']['routingnumber'] = $val ;
          $_SESSION['errors']['routingnumber'] = 'hidden';
          $len = strlen($val);
          
          if( $val === false || $len !== 9)
          {
              $_SESSION['errors']['routingnumber'] = CSSERROR;
              return;
          }              
          
          $a   = array();
          for( $cnt = 0; $cnt < $len; ++$cnt)
          {
              array_push($a,intval(substr($val,$cnt,1) ) );
          }
          
          $beg = 3 * ( $a[0] + $a[3] + $a[6]);
          $med = 7 * ( $a[1] + $a[4] + $a[7]);
          $end = $a[2] + $a[5] + $a[8];
          $tot = $beg + $med + $end;
          
          if( $tot % 10 !== 0 )
          {
               $_SESSION['errors']['routingnumber'] = CSSERROR;
          }
	  }
	  ///////// End RoutingNumber ////////////////////////////////
	  
	  ///////// BankAccountNumber ////////////////////////////////////
	  private function ValidateBankAccountNumber()
	  {	  
          if( !isset($_POST['bankaccountnumber'] )  )
          {
              $_SESSION['errors']['bankaccountnumber'] = CSSERROR;
              return;
          }
          
		  $val  = filter_input( INPUT_POST, 'bankaccountnumber', FILTER_SANITIZE_NUMBER_INT  );	
		          		  
		  $_SESSION['values']['bankaccountnumber'] = $val3;
		  $_SESSION['errors']['bankaccountnumber'] = 'hidden';
		  
		  if( $val3 === false )
		  {
			  $_SESSION['errors']['bankaccountnumber'] = CSSERROR;
			  return;
		  }
	  }
	  ///////// End BankAccountNumber ////////////////////////////////
	  
	   ///////// Bank Name ////////////////////////////////////
	  private function ValidateBankName()
	  {      
          if( !isset($_POST['bankname'] )  )
          {
              $_SESSION['errors']['bankname'] = CSSERROR;
              return;
          }
          
          $val = filter_input( INPUT_POST, 'bankname', FILTER_SANITIZE_STRING  );
          $_SESSION['values']['bankname'] = $val;         
          
		  if( CValidator::ValidateName($val) === false)
          {
                $_SESSION['errors']['bankphone'] = CSSERROR;
                return;
          }     
          
          $_SESSION['values']['bankname'] = $val;   
          $_SESSION['errors']['bankphone'] = 'hidden';  	   
	  }
	  ///////// End Bank Name ////////////////////////////////
		
	  ///////// Bank Phone ////////////////////////////////////
	  private function ValidateBankPhone()
	  {	                                  
          if( !isset($_POST['bankphone'] )  ) 
          {
              $_SESSION['errors']['bankphone'] = CSSERROR;
              return;
          }   
          
          $val  = filter_input( INPUT_POST, 'bankphone', FILTER_SANITIZE_STRING  ); 
          $_SESSION['values']['bankphone'] = $val;   
                        
          if( CValidator::ValidateUSPhone($val) === false)
          {
                $_SESSION['errors']['bankphone'] = CSSERROR;
                return;
          }
         
          $_SESSION['values']['bankphone']  = $val;
          $_SESSION['errors']['bankphone'] = 'hidden';          
	  }
	  ///////// End Bank Phone ////////////////////////////////
	  
}
?>