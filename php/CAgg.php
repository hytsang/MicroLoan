<?php



class CAgg extends CBaseAggregator
{    
    
    private $hop  = array("WEEKLY" => "Weekly","BIWEEKLY" => "Every 2 weeks",
                          "TWICEMONTH" => "Twice a month","MONTHLY" => "Monthly");    
                          
    private $vid;
    private $vpw;
      
   // constructor 
   public function __construct()
   {
		
   }

   // destructor 
   public function __destruct()
   {
          
   }     
   
   private function AddToBankInfoTable()
   {
	   try
        {
             $pdo = new PDO(.....);   
		     $ss = $_SESSION['values']['accounttype'];
			 $st = $_SESSION['values']['monthswithbank'];
			 $sa = $_SESSION['values']['bankaccountnumber'];
			 $ci = $_SESSION['values']['routingnumber'];
			 $zi = $_SESSION['values']['bankname'];
			 $ta = $_SESSION['values']['bankphone'];

     
             $sql = "INSERT INTO bank_info  (accountType, monthswithbank,accountnumber, routingnumber,
                                                                bankname, bankphone)
                     VALUES( '".$ss."' , '".$st."','".$sa."','".$ci."','".$zi."','".$ta."')";
	
	         $pdo->exec($sql);
         }
        catch ( PDOException $e )
        {
             echo $e->getMessage();  
        }        
   }
   
   private function AddToAddressTable()
   {
	   try
        {
             $pdo = new PDO(.....);    
		     $ss =  $_SESSION['values']['ss'];
			 $st =  $_SESSION['values']['address'];
			 $sa =  $_SESSION['values']['state'];
			 $ci =  $_SESSION['values']['city'];
			 $zi =  $_SESSION['values']['zip'];
										// $_SESSION['values']['apartment'];
			 $ta =  $_SESSION['values']['timeataddress'];

     
			 $sql = "INSERT INTO address  (ssn, street,state, city,zip,timeataddress)
                     VALUES( '".$ss."' , '".$st."','".$sa."','".$ci."','".$zi."','".$ta."')";
	
			 $pdo->exec($sql);
         }
        catch ( PDOException $e )
        {
			echo $e->getMessage();  
        }         
   }
   
   private function AddToEmploymentTable()
   {
		try
        {
			  $pdo = new PDO(.....);  
			 $ss = $_SESSION['values']['ssn'];
			 $st = $_SESSION['values']['employer'];
			 $sa = $_SESSION['values']['incometype'];
			 $ci = $_SESSION['values']['employerphone'];
			 $zi = $_SESSION['values']['monthsemmployed'];
			 $hp = $_SESSION['values']['howoftenpaid'];
			 $ta = $_SESSION['values']['lastpaydate'];
			 $tb = $_SESSION['values']['nextpaydate'];
			 $tc = $_SESSION['values']['receivepaycheck'];      
			 $mi = $_SESSION['values']['receivepaycheck'];    
     
			 $sql = "INSERT INTO employment  (ssn, employer,income_type, employer_phone,months_employed,
		                                  howoftenpaid,lastpaydate,nextpaydate,receivepaycheck,
										  monthlyincome)
                     VALUES( '".$ss."' , '".$st."','".$sa."','".$ci."','".$zi."', '".$hp."','".$ta."',
					         '".$tb."','".$tc."','".$mi."')";
	
			$pdo->exec($sql);
         }
        catch ( PDOException $e )
        {
           echo $e->getMessage();  
        } 
   }

   private function AddToNameSSBdateTable()
   {
        try
        {
			  $pdo = new PDO(.....);     
			 $ss = $_SESSION['values']['ss'];
			 $fn = $_SESSION['values']['fname'];
			 $ln = $_SESSION['values']['lname'];
			 $bd=  $_SESSION['values']['dateofbirth'];
				 
			 $sql = "INSERT INTO name_ss_bdate(ss, fname,lname, bdate)
						 VALUES( '".$ss."' , '".$fn."','".$ln."','".$bd."')";
		
			 $pdo->exec($sql);
        }
        catch ( PDOException $e )
        {
			 echo $e->getMessage();  
        } 
   }
  
    private function AddToPersonalMiscTable()
	{
	    /*try
        {
           $pdo = new PDO(.....);    
		   $ss = $_SESSION['values']['ssn'];
		   $ba = $_SESSION['values']['bankAct'];
		   $im = $_SESSION['values']['ismilitary'];
		   $la = $_SESSION['values']['employerphone'];
           $dl ="P12345";
		   $si = "IN";
		   $ho = "Yes";
            		     
           $sql = "INSERT INTO personal_misc(ss, havebankacct,inmilitary, minloanamount,
		                                   driverslicense,stateid,homeowner)
                     VALUES( '".$ss."' , '".$ba."','".$im."','".$la."','".$dl."' , '".$si."','".$ho."')";
	
	       $pdo->exec($sql);
         }
        catch ( PDOException $e )
        {
           echo $e->getMessage();  
        } */
	}
  
  
   protected function AddFormDataToDB()
   {        
      /* $this->AddToBankInfoTable();		 
	   $this->AddToAddressTable();	
	   $this->AddToEmploymentTable();
	   $this->AddToNameSSBdateTable();*/
	   // $this->AddToPersonalMiscTable();    
   }

   public function Execute()
   { 
       // $this->AddFormDataToDB();
		
       /* if(  $this->GetIdPword() === false)
        {
                 header("Location:" . '/gmft' );
        }       */
		
		self::FillPostData();
   }
   
   private function GetIdPword()
   {       
        try
        {
            $pdo = new PDO(.....);   

           $q = $pdo->query('SELECT * FROM lfCredentials ORDER BY price DESC');
           $q->setFetchMode(PDO::FETCH_NUM);
           
           while( $r = $q->fetch())
           {
               $this->vid = $r[1];
               $this->vpw = $r[2];

               if (  $this->FillPostData() === true)
               {      
                   return true;
               }                
           }
        }
        catch ( PDOException $e )
        {
           echo $e->getMessage();  
        }  

        return false;
   }
  
   protected function FillPostData()
   { 		
			 $directDeposit	= ( $_SESSION['values']['receivepaycheck'] == 'Electronic Deposit' ? 1 : 0 );			 
			 $incomteType   = 'BENEFITS';
			 
			 $bdv  = $_SESSION['values']['dateofbirth'];
			 $mon  =  substr($bdv, 0, 2); 
			 $day  =  substr($bdv, 2, 2); 
			 $year =  substr($bdv, 4, 4); 
			 
			 $birthDate  = $year  . '-' . $mon . '-' . $day;
			 
			 $ho = $_SESSION['values']['howoftenpaid'];
			 
			 foreach( $this->hop as $key=>$value)
			 {
				 if($ho === $value)
				 {
					   $ho = $key;   
					   break; 
				 }
			 }
			 
			 if(  $_SESSION['values']['incometype']   ===  'Employed' ||
				  $_SESSION['values']['incometype']   ===  'Self Employed')
			 {
				  $incomteType   =  'EMPLOYMENT';
			 }
				
			 $this->postData = array( 
			 'vendor_id'           => 165954, // $this->vid, 
			 'vendor_pass'         => 958654322, //$this->vpw,
			 'lead_type_id'        => 14,
			 'Lid'                 => 0,
			 'test_app'            => 1,
			 'auto_redirect'       => 0,
			 'first_name'          => $_SESSION['values']['fname'],
			 'last_name'           => $_SESSION['values']['lname'],
			 'street_addr1'        => $_SESSION['values']['address'], 
			 'city'                => $_SESSION['values']['city'],
			 'state'               => $_SESSION['values']['state'],
			 'Zip'                 => $_SESSION['values']['zip'],
			 'social_security'     => $_SESSION['values']['ssn'],
			 'phone_home'          => $_SESSION['values']['phone'],
			 'phone_cell'          => 9545551236,//$_SESSION['values']['city'],
			 'phone_work'          => $_SESSION['values']['employerphone'],// 9545551236
			 'Email'               => $_SESSION['values']['email'],
			 'birth_date'          => $birthDate,
			 'employer_name'       => $_SESSION['values']['employer'],       
			 'pay_frequency'       => $ho, //strtoupper($_SESSION['values']['howoftenpaid']),
			 'direct_deposit'      => $directDeposit,
			 'pay_day1'            => $_SESSION['values']['lastpaydate'],
			 'pay_day2'            => $_SESSION['values']['nextpaydate'],
			 'bank_aba'            => $_SESSION['values']['routingnumber'],
			 'bank_account'        => $_SESSION['values']['bankaccountnumber'],
			 'bank_name'           => $_SESSION['values']['bankname'],
			 'income_monthly'      => '2000', // $_SESSION['values']['selectmonthlyincome'],
			 'own_home'            => $_SESSION['values']['homeowner'],
			 'drivers_license'     => $_SESSION['values']['stateid'],
			 'drivers_license_st'  => $_SESSION['values']['idstate'],
			 'client_url_root'     => 'mysite.com', 
			 'client_ip_address'   => '10.10.10.10',//$_SESSION['values']['city'], //////////////// TODO
			 'months_employed'     => $_SESSION['values']['monthsemmployed'],
			 'income_type'         => $incomteType,
			 'is_military'         => $_SESSION['values']['ismilitary'],
			 'is_live'             => 1,
			 'bank_account_type'   => strtoupper($_SESSION['values']['accounttype']),
			 'requested_amount'    => '300', // $_SESSION['values']['loanamount'], //////////////// TODO
			 'accepted_terms'      => 1,
			 'months_at_address'   => $_SESSION['values']['timeataddress'],
			 'months_at_bank'      => $_SESSION['values']['monthswithbank'],
			 'delimiter'           => 'xml'            
			  ) ;
			  
			 return $this->SendDataToAggregator();
 
   }
   
   protected function SendDataToAggregator()
   {
            $ss      =  http_build_query($this->postData );
			// var_dump($ss );   

		    $url = 'http:///';
		   
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$ss );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);     // Return in string
			curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);

			$s        =  http_build_query($this->postData  );
			$size     = strlen($s);
			$headers  = array( 'Content-Length: '  .$size );
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );             

            $responseBody   = curl_exec($ch);
            $xml = simplexml_load_string($responseBody , 'SimpleXMLElement', LIBXML_NOCDATA);   
            // var_dump($xml);

            $url      = $xml->message;
            $status   = $xml->status;

            if( $xml->status == "accepted")
            {    			
                header("Location:" . $xml->message );
                return true;		 
                // return $xml->message;         
            }
            else if( $xml->status == "declined")
            {
                return false;                
            }  
            else if( $xml->status == "error")
            {
                header("Location:" . '/../gmft');  

                // true even though it is an error because
                // we do not want to resend any post to
                // the lf server until we can correct any errors.
                return true;       
            }

            //$requestHeaders = curl_getinfo($ch, CURLINFO_HEADER_OUT);           
   }
}
?>
