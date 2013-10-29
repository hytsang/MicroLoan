<?php 

session_start();
 
 require_once (__DIR__.'/php/init.php');   
 require_once (__DIR__.'/php/cSelectOptions.php');   
 require_once (__DIR__.'/php/Validator.php');    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<noscript>
  <?php $_SESSION['values']['javascriptdisabled'] = 1;?>
</noscript>

<link rel="stylesheet" type="text/css" href="http://localhost/gmft/css/form.css">     
<link rel="stylesheet" type="text/css" href="https://jquery-ui.googlecode.com/svn/!svn/bc/3147/branches/labs/mask/themes/base/ui.all.css">    

       
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>   
    <script type="text/javascript" src="js/jquery-ui-1.10.1.custom.min.js"></script>
    <script type="text/javascript" src="js/jq_ui.js"></script>    
    <script type="text/javascript" src="js/mask.js"></script>    
    <script type="text/javascript" src="js/jquery.ui.datepicker.validation.min.js"></script>    
   

<body>


<form id = "formApp" method = "post" action = "php/submit.php">

	<fieldset>
    
    	<legend>Personal Information</legend>
        
        <!-- Bank account -->
        <div class = "clearit">
         <label>Do you have a bank account?</label>
           <select name="bankAct"  id="bankAct" required = "true" >     		 
              <?php CSelectOptions::buildOptions(CSelectOptions::getYesNoOptions(),  $_SESSION['values']['bankAct']); ?>
    	   </select>
		   
		    <span id="txtDoYouHaveABankActFailed"
              class="<?php echo $_SESSION['errors']['bankAct'] ?>">
              Please select an option.
           </span>
		 		   
        </div>
        <!-- End Bank account --> 
                
         <!-- Is military -->
        <div class = "clearit">
         <label>Are you in the Military?</label>
           <select name="ismilitary"  id="ismilitary" required = "true" >     		 
             <?php CSelectOptions::buildOptions(CSelectOptions::getYesNoOptions(),  $_SESSION['values']['ismilitary']); ?>
    	   </select>
				   
	       <span id="txtMilitaryFailed"
              class="<?php echo $_SESSION['errors']['ismilitary'] ?>">
              Please select an option.
           </span>
        </div>
        <!-- End Is military -->
        
        
        
       <!-- Loan amount-->
        <div class = "clearit">
         <label>Minimum Loan Amount</label>
           <select name="loanamount"  id="loanamount" required = "true" >     		 
             <?php CSelectOptions::buildOptions(CSelectOptions::getLoanAmountOptions(),  $_SESSION['values']['loanamount']); ?>
    	   </select>
				   
	       <span id="txtLoanAmount"
              class="<?php echo $_SESSION['errors']['loanamount'] ?>">
              Please select an option.
           </span>
        </div>
        <!-- End Loan amount -->  
        
        
        
        <!-- First Name -->
      <div class = "clearit">
        <label>First Name</label>
        <input name = "fname" type="text" maxlength="20" id ="fname" required = "true" placeholder="Enter first name"		     
		   value = "<?php echo $_SESSION['values']['fname']; ?>"  />
		   
		<span id="txtNameFailed"
              class="<?php echo $_SESSION['errors']['fname'] ?>">
              Please enter your first name.
        </span>
		
      </div>
        <!-- End First Name -->
        
        <!-- Last Name -->
      <div class = "clearit">
        <label>Last Name</label>
        <input name = "lname" type="text" maxlength="25" id = "lname" required = "true"
		value="<?php echo $_SESSION['values']['lname']; ?>" /> 
		
		<span id="txtLastNameFailed"
              class="<?php echo $_SESSION['errors']['lname'] ?>">
              em enter your last name.
        </span>
		
      </div>
        <!-- End Last Name -->
        
      <!-- Street Address -->
      <div class = "clearit">
        <label>Street Address</label>
        <input name = "address" type="text" maxlength="30" required = "true"
		value="<?php echo $_SESSION['values']['address']; ?>" /> 
		
		<span id="txtAddressFailed"
              class="<?php echo $_SESSION['errors']['address'] ?>">
              Please enter your address.
        </span>
		
      </div>
      <!-- End Street Addresse -->
      
      <!-- Apartment # -->
      <div class = "clearit">
        <label>Apartment #</label>
        <input name = "apartment" type="text" maxlength="30" 
		value="<?php echo $_SESSION['values']['apartment']; ?>" />  
      </div>
      <!-- End Apartment # -->
      
      <!-- City # -->
      <div class = "clearit">
        <label>City</label>
        <input name = "city" type="text" maxlength="30" required = "true"
		value="<?php echo $_SESSION['values']['city'] ?>"  /> 
      </div>
      <!-- End City # -->
	  
	  <span id="txtCityFailed"
              class="<?php echo $_SESSION['errors']['city'] ?>">
              Please enter your city.
      </span>
      
       <!-- State -->
        <div class = "clearit">
         <label>State</label>
           <select name="state"  id="state" required = "true" >
     		 <?php CSelectOptions::buildOptions(CSelectOptions::getStateOptions(),  $_SESSION['values']['state']); ?>
    	   </select>
        </div>
        <!-- End State -->
		
		<span id="txtStateFailed"
              class="<?php echo $_SESSION['errors']['state'] ?>">
              Please select your state.
        </span>
        
      <!-- Zip Code  -->
      <div class = "clearit">
        <label>Zip Code</label>
        <input name = "zip" id = "zip" type="text" maxlength="5" required = "true"
		value="<?php echo $_SESSION['values']['zip'] ?>"  /> 
		
		 <span id="txtZipFailed"
              class="<?php echo $_SESSION['errors']['zip'] ?>">
              Please enter your zip.
        </span>
		
      </div>
      <!-- End Zip Code -->
      
	 
          
      <!-- Time at address -->
      <div class = "clearit">
      <label>Time at address</label> 
       <select name="timeataddress" id="timeataddress" required = "true">
            <?php CSelectOptions::buildOptions(  CSelectOptions::getTimeAtAddressOptions() ,  $_SESSION['values']['timeataddress']); ?>           
      </select>
	  
	   <span id="txtTimeAtAddressFailed"
              class="<?php echo $_SESSION['errors']['timeataddress'] ?>">
              Please select a value.
      </span>
	  
      </div>
      <!-- End Time at address -->
      
       <!-- Primary Phone  -->
      <div class = "clearit">
        <label>Primary Phone</label>
		
        <input name = "phone" id = "phone" type="text" maxlength="13" required = "true"
		value="<?php echo $_SESSION['values']['phone'] ?>"  /> 
			
		 <span id="txtPrimaryPhoneFailed"
              class="<?php echo $_SESSION['errors']['phone'] ?>">
              Please enter your phone number.
         </span>
		
      </div>
      <!-- End Primary Phone  -->
      
      <!-- Best Time To Call -->
      <div class = "clearit">
      <label>Best Time To Call</label> 
       <select name="besttime" id="besttime" required = "true">
            <?php CSelectOptions::buildOptions(CSelectOptions::getBestTimeToCallOptions() ,$_SESSION['values']['besttime']); ?> 
      </select>
	  
	  <span id="txtBestTimeFailed"
              class="<?php echo $_SESSION['errors']['besttime'] ?>">
              Please select a value.
      </span>
	  
      </div>
      <!-- End Best Time To Call -->
      
      <!-- Email  -->
      <div class = "clearit">
        <label>Email</label>
        <input name = "email" id = "email" type="text" required = "true"
		value="<?php echo $_SESSION['values']['email'] ?>"  /> 		
		
	   <span id="txtEmailFailed"
              class="<?php echo $_SESSION['errors']['email'] ?>">
              Please enter your email.
      </span>
      </div>
      <!-- End Email  -->
      
       <!--Verify Email  -->
      <div class = "clearit">
        <label>Verify Email</label>
        <input name = "verifyemail" type="text" required = "true"
		value="<?php echo $_SESSION['values']['verifyemail'] ?>"  />
		
	  <span id="txtVerifyEmailFailed"
              class="<?php echo $_SESSION['errors']['verifyemail'] ?>">
              Please verify email.
      </span>
	  
      </div>
      <!-- EndVerify Email  -->
      
       <!-- Date of Birth -->
      <div class = "clearit">
	  
      <label>Date of Birth</label> 
	   
	   <input name = "dateofbirth" id = "dateofbirth" type="text" maxlength="13" required = "true"
		value="<?php echo $_SESSION['values']['dateofbirth'] ?>"  /> 
		     	  
	   <span name = "dob" id="txtDateOfBirthFailed"
              class="<?php echo $_SESSION['errors']['dateofbirth'] ?>">
              Please enter birth date.
      </span>
	  
      </div>
      <!-- End Date of Birth -->
      
      
       <!-- Social Security   -->
      <div class = "clearit">
        <label>Social Security</label>
       	
		 <input name = "ssn" id = "ssn" type="text" maxlength="11" required = "true"
		value="<?php echo $_SESSION['values']['ssn'] ?>"  /> 		
		
	  <span id="txtSSFailed"
              class="<?php echo $_SESSION['errors']['ssn'] ?>">
              Please select a value.
      </span>
		
      </div>
      <!-- End Social Security   -->
    
       <!-- Driver's License   -->
      <div class = "clearit">
        <label>Driver's License or State ID# </label>
        <input name = "stateid" type="text" required = "true"
		value="<?php echo $_SESSION['values']['stateid'] ?>"  /> 
		
	   <span id="txtDriversLicenseFailed"
              class="<?php echo $_SESSION['errors']['stateid'] ?>">
              Please enter your state id.
      </span>
		
      </div>
      <!-- End Driver's License   --> 
      
       <!-- ID State   -->
      <div class = "clearit">
        <label>ID State </label>
        		
		<select name="idstate" id="idstate" required = "true" >
           <?php CSelectOptions::buildOptions(CSelectOptions::getStateOptions() ,$_SESSION['values']['idstate']); ?> 
        </select>
		
	   <span id="txtIdStateFailed"
              class="<?php echo $_SESSION['errors']['idstate'] ?>">
              Please enter the state.
      </span>
		
      </div>
      <!-- End ID State   --> 
      
     <!-- Time at address -->
      <div class = "clearit">
      <label>Are you a Home Owner?</label> 
       <select name="homeowner" id="homeowner" required = "true" >
           <?php CSelectOptions::buildOptions(CSelectOptions::getYesNoOptions() ,$_SESSION['values']['homeowner']); ?> 
      </select>
	  
	   <span id="txtHomeOwnerFailed"
              class="<?php echo $_SESSION['errors']['homeowner'] ?>">
              Please enter the state.
      </span>
	  
      </div>
      <!-- End Time at address -->      
        
    </fieldset>
    
  <fieldset>
       <legend>Employment Information</legend>
       
      <!-- Employer   -->
      <div class = "clearit">
        <label>Employer </label>
        <input name = "employer" type="text" required = "true"
		value="<?php echo $_SESSION['values']['employer'] ?>"  /> 	
		
	   <span id="txtEmploymentFailed"
              class="<?php echo $_SESSION['errors']['employer'] ?>">
              Please enter your employer.
       </span>
	  
      </div>
      <!-- End Employer  --> 
      
      <!-- Months with Bank Account -->
      <div>
         <label>Income Type</label>     
		 <select name="incometype" id="select7" required = "true" >
			<?php CSelectOptions::buildOptions(CSelectOptions::getIncomeTypeOptions() ,$_SESSION['values']['incometype']); ?> 
		 </select>
		 
		  <span id="txtIncomeTypeFailed"
              class="<?php echo $_SESSION['errors']['incometype'] ?>">
              Please select an option.
         </span>
      </div>
      <!-- End Months with Bank Account -->
       
       <!-- Employer phone   -->
      <div class = "clearit">
        <label>Employer Phone </label>	
		
        <input name = "employerphone" id ="employerphone" type="text" maxlength="13" required = "true"
		value="<?php echo $_SESSION['values']['employerphone'] ?>"  /> 		
			
	  <span id="txtEmployerPhoneFailed"
              class="<?php echo $_SESSION['errors']['employerphone'] ?>">
              Please enter employer phone.
      </span>
	  
      </div>
      <!-- End Employer phone  -->
       
      <div>
      <label>Months Employed?</label>      
        <!-- Months employed  -->
		<select name="monthsemmployed" id="select8" required = "true" >
		  <?php CSelectOptions::buildOptions(CSelectOptions::getMonthsEmmployedOptions() ,$_SESSION['values']['monthsemmployed']); ?> 
		</select>
		
		 <span id="txtMonthsEmployedFailed"
              class="<?php echo $_SESSION['errors']['monthsemmployed'] ?>">
              Please select an option.
         </span>
		 
      </div>
      <!-- End Months employed  --> 
      
       <!-- How often paid   -->
      <div class = "clearit">
      <label>How Often are you Paid?</label>
       <select name="howoftenpaid" id="select9" required = "true" >
	       <?php CSelectOptions::buildOptions(CSelectOptions::getHowOftenPaidOptions() ,$_SESSION['values']['howoftenpaid']); ?> 
       </select>
	   <span id="txtHowOftenPaidFailed"
              class="<?php echo $_SESSION['errors']['howoftenpaid'] ?>">
              Please select an option.
         </span>
      </div>
      <!-- End How often paid  -->
       
       <!-- Last Pay Date   -->
      <div class = "clearit">
        <label>Last Pay Date </label>
		
		 <input name = "lastpaydate" id = "lastpaydate" type="text" maxlength="13" required = "true"
		 value="<?php echo $_SESSION['values']['lastpaydate'] ?>"  /> 
          	
		 <span id="txtLastPayDateFailed"
              class="<?php echo $_SESSION['errors']['lastpaydate'] ?>">
              Please enter date.
         </span>
		
      </div>
      <!-- End Last Pay Date  --> 
      
        <!-- Next Pay Date   -->
      <div class = "clearit">
        <label>Next Pay Date </label>
		
		 <input name = "nextpaydate" id = "nextpaydate" type="text" maxlength="13" required = "true"
		 value="<?php echo $_SESSION['values']['nextpaydate'] ?>"  /> 
	   		
		 <span id="txtNextPayDateFailed"
              class="<?php echo $_SESSION['errors']['nextpaydate'] ?>">
              Please enter date.
         </span>
		
      </div>
      <!-- End Next Pay Date  --> 
	  
	  
	  
	  
        <!-- Next Pay Date   -->
      <div class = "clearit">
        <label>Pay Date After Next</label>
		
		<input name = "paydateafternext" id = "paydateafternext" type="text" maxlength="13" required = "true"
		 value="<?php echo $_SESSION['values']['paydateafternext'] ?>"  /> 
	   		
		 <span id="txtNextPayDateFailed"
              class="<?php echo $_SESSION['errors']['paydateafternext'] ?>">
              Please enter date.
         </span>
		
      </div>
      <!-- End Next Pay Date  --> 
	  
	  
	  
       
      <div>
      <label>How are you paid?</label>
       <select name="receivepaycheck" id="select10" required = "true" >
	        <?php CSelectOptions::buildOptions(CSelectOptions::getHowPayCheckReceivedOptions() ,$_SESSION['values']['receivepaycheck']); ?> 	 
      </select>	
	  
	   <span id="txtHowPayCheckReceivedFailed"
              class="<?php echo $_SESSION['errors']['receivepaycheck'] ?>">
              Please select an option.
       </span>
		 
      </div> 
       
       <div>
       <label>Monthly income</label>
         <select name="selectmonthlyincome" id="select11" required = "true" >
		    <?php CSelectOptions::buildOptions(CSelectOptions::getMonthlyIncomeOptions() ,$_SESSION['values']['selectmonthlyincome']); ?>
         </select>
		 
		 <span id="txtMonthlyIncomeTypeFailed"
              class="<?php echo $_SESSION['errors']['selectmonthlyincome'] ?>">
              Please select an option.
       </span>
		 
       </div>
       
  </fieldset>
     
     
   <fieldset><legend>Financial Information</legend>
   
  <div><label>Account type</label>   
    <select name="accounttype" id="select12" required = "true">
	   <?php CSelectOptions::buildOptions(CSelectOptions::getAccountOptions(),  $_SESSION['values']['accounttype']); ?>
    </select>
	 <span id="txtAccountTypeFailed"
              class="<?php echo $_SESSION['errors']['accounttype'] ?>">
              Please select an option.
       </span>
   </div>
    
    <div><label>Months with Bank Account?</label>
     
      <select name="monthswithbank" id="select13" required = "true" >
	     <?php CSelectOptions::buildOptions(CSelectOptions::getMonthsWithBankOtions() ,$_SESSION['values']['monthswithbank']); ?>
	  </select>
	  
	  <span id="txtMonthWithBankFailed"
              class="<?php echo $_SESSION['errors']['monthswithbank'] ?>">
              Please select an option.
      </span>
	  
   </div>
    
    <img src="http://localhost/lf3/img/check-image.gif" width="516" height="200" alt = "Check Example"/>
    
    <div>
       <label>ABA/Routing Number</label>
      
      <input type="text" name="routingnumber" id="routingnumber" maxlength="9" required = "true"
	  value="<?php echo $_SESSION['values']['routingnumber'] ?>"  />
	  
	  <span id="txtRoutingNumberFailed"
              class="<?php echo $_SESSION['errors']['routingnumber'] ?>">
              Please enter routing number.
      </span>
	  
	 </div>
    
    <div><label>Account Number</label>
      
      <input type="text" name="bankaccountnumber" id="text14" required = "true"
	  value="<?php echo $_SESSION['values']['bankaccountnumber'] ?>"  /> 
	  
	  <span id="txtBankAccountNumberFailed"
              class="<?php echo $_SESSION['errors']['bankaccountnumber'] ?>">
              Please enter bank account number.
      </span>
	  
  </div>
    
    <div><label>Bank Name</label>
      
      <input type="text" name="bankname" id="text15" required = "true"
	  value="<?php echo $_SESSION['values']['bankname'] ?>"  /> 
	  
	  <span id="txtBankNameFailed"
              class="<?php echo $_SESSION['errors']['bankname'] ?>">
              Please enter bank name.
      </span>
	  
   </div>
    
    <div><label>Bank Phone</label>
     
     
        <input name = "bankphone" id = "bankphone" type="text" maxlength="13" required = "true"
		value="<?php echo $_SESSION['values']['bankphone'] ?>"  /> 	
	
      <span id="txtBankPhoneFailed"
              class="<?php echo $_SESSION['errors']['bankphone'] ?>">
              Please enter bank phone #.
      </span>
     
 </div>
  </fieldset> 
  
  </div>


<div id = "wait">
<p> Please be patient. It may take up to 90 seconds to process your application.</p>
</div>

 <div><input type="submit" name="submit" id="submit" 
class = "subButton" value="Get Loan" /></div>
</form>



</body>
</html>