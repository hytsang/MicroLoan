<?php 
session_save_path( "/home/users/web/b46/ipg.leddsoftwarecom/cgi-bin/tmp" );
session_start();

require_once ('cSelectOptions.php');

class CValidator          
{
    
      private static $strFilter = array('=','`','_','!','@','#','$','%','^','&','*','+','{','}',':',';',
                           '<','>','~','[',']','?','|','-', '/' ,' ', "\t", "\n", "\r","(",")");  
                           
      private static $removeNumbers = array('0','1','2','3','4','5','6','7','8','9');
	 	  
	  public static function StringFilter(&$val = null)
	  {
            if( $val === null) return;
            
		    $val = str_replace(self::$strFilter , '', $val); 	
	  }
      
      public static function ValidateDOB( &$birth=null)
      {
          if( $birth === null) return false;            
                   
          if( self::IsValidDate($birth) === 1) 
          {
             $birth = str_replace(self::$strFilter , '', $birth);   
             return true;
          }
          
          return false;   
      }
         
      public static function ValidatePhone( $area=null,$prefix=null,$body=null)
      {
           $val1 = filter_var($area, FILTER_SANITIZE_NUMBER_INT  );                        
           $val2 = filter_var($prefix, FILTER_SANITIZE_NUMBER_INT  );           
           $val3 = filter_var($body, FILTER_SANITIZE_NUMBER_INT  );          
		           		 
           if (strlen($val1) !== 3 || strlen($val2) !== 3 || strlen($val3) != 4) 
           {              
               return false;
           }
		   
		    // area code
           $exp1 = "/^[2-9]{1}[0-9]{2}$/";

           // prefix
           $exp2 = "/^[0-9]{3}$/";      
                      
           // body
           $exp3 = "/^[0-9]{4}$/";

           $pm  = preg_match($exp1, $val1);	
           $pm2 = preg_match($exp2, $val2);    
           $pm3 = preg_match($exp3, $val3);   
           
           return  ( $pm !== false &&  $pm2 !== false  && $pm3 !== false );  		 
      }
	  
	  public static function ValidateUSPhone( &$number=null)
      {
           if( $number === null || strlen($number) === 0) return false;
           
           $val    = filter_var($number, FILTER_SANITIZE_NUMBER_INT  );
           $val1   = str_replace(self::$strFilter , '', $val);                       
		            		 
           if (strlen($val1) !== 10 || $val1 === false  || $val1 === 0) 
           {              
               return false;
           }
           
           $number = $val1;
		   
		   // area code
		   $area = substr($val1, 0, 3); 
           $exp1 = "/^[2-9]{1}[0-9]{2}$/";

           // prefix
		   $prefix = substr($val1, 3, 3); 
           $exp2 = "/^[0-9]{3}$/";      
                      
           // body
		   $body = substr($val1, 6, 4); 
           $exp3 = "/^[0-9]{4}$/";

           $pm  = preg_match($exp1, $area);	
           $pm2 = preg_match($exp2, $prefix);    
           $pm3 = preg_match($exp3, $body);   
           
           return  ( $pm !== false &&  $pm2 !== false  && $pm3 !== false );  	 
      }
	 	  
	  public static function ValidateUSZip( &$zip = null)
      { 
          $zip  = filter_var($zip, FILTER_SANITIZE_NUMBER_INT  );  
          $zip  = filter_var($zip, FILTER_VALIDATE_INT  );  
                           
          if( $zip === false || strlen($zip) !== 5 )
          {
              return false;
          }       
          
          // final  = preg_match("/^[0-9]{5}(?:-[0-9]{4})?$/", $val);  
          $exp  = "/^[2-9]{1}[0-9]{4}$/"; 
          
          $final =  preg_match($exp, $zip);
          
          return $final;     
      }
      ///////// End Zip ///////////////////
	  
	  ///////// First Name ///////////////////
	  public static function ValidateName(&$name=null)
	  {      
          if( $name === null || strlen($name) === 0) return false;
          
		  $name = filter_var( $name, FILTER_SANITIZE_STRING );
          $name = str_replace( self::$removeNumbers,'',$name);
          $name = str_replace( self::$strFilter, '' , $name);     
		  
		  if( $name === false || strlen($name) === 0)
		  {
			  return false;
		  }
         
          return ctype_alpha($name);
	  }	  
	  ///////// End First Name ///////////////////          	  
	  
	  
	  ////////// Email  ////////////////////////////////
	  public static function ValidateEmail( &$email = null)
	  {		
          if( $email === null || strlen($email) === 0) return false;
                
		  $email  = filter_var( $email, FILTER_SANITIZE_EMAIL  );				  
		  $email  = filter_var( $email, FILTER_VALIDATE_EMAIL);
		  
		  return ( $email !== false );		 
	  }
	  ///////// Email /////////////////////////////////
	  
	  
	  
	  ////////// Verify SS  ////////////////////////////////
	  public static function ValidateSociallSecurity(&$ssn=null)
	  {	            		 
		 if( $ssn === null) return false;               
		 
		 $reg = "/^(?!000|666)[0-8][0-9]{2}-?(?!00)[0-9]{2}-?(?!0000)[0-9]{4}$/";
		 $ssn = str_replace( self::$strFilter, '' , $ssn);  
		 
		 if (preg_match($reg,$ssn) !== 1) 
		 {
		     return false;
		 }		
         
         return true;
	  }
	  ///////// End SS /////////////////////////////////  
      
      /// Test for MM/DD/YYYY validity.
      public static function IsValidDate(&$date=null)
      {
             if( $date === null) return false;
             
             $final = preg_match("/^(0?[1-9]|1[012])[ \/.-](0?[1-9]|[12][0-9]|3[01])[ \/.-](19|20)\d\d$/",$date);
             
             return ($final === 1 ? 1 : 0 );
      }
	
}
?>