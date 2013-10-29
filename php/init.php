<?php             							   
				

				
if (!isset($_SESSION['values']))
{
  $_SESSION['values']['bankAct']     = '';  
  $_SESSION['values']['ismilitary']  = '';
  $_SESSION['values']['loanamount']  = '';
  $_SESSION['values']['accounttype'] = '';
  $_SESSION['values']['fname']       = '';
  $_SESSION['values']['lname']       = '';
  $_SESSION['values']['address']     = '';
  $_SESSION['values']['apartment']   = '';
  $_SESSION['values']['city']        = '';
  $_SESSION['values']['state']       = '';
  $_SESSION['values']['zip']         = '';
  $_SESSION['values']['timeataddress'] = '';
  $_SESSION['values']['phone']       = '';
  $_SESSION['values']['besttime']    = '';
  $_SESSION['values']['email']       = '';
  $_SESSION['values']['verifyemail'] = '';
  $_SESSION['values']['dateofbirth'] = '';
  $_SESSION['values']['ssn']          = '';
  $_SESSION['values']['stateid']     = '';
  $_SESSION['values']['idstate']     = '';
  $_SESSION['values']['homeowner']   = '';
  $_SESSION['values']['employer']    = '';
  $_SESSION['values']['incometype']  = '';
   $_SESSION['values']['employerphone']   = '';
   $_SESSION['values']['monthsemmployed']  = '';
  $_SESSION['values']['howoftenpaid']     = '';
  $_SESSION['values']['lastpaydate']      = '';
   $_SESSION['values']['nextpaydate']      = '';
   $_SESSION['values']['paydateafternext']      = '';
  $_SESSION['values']['receivepaycheck']  = '';
  $_SESSION['values']['selectmonthlyincome']  = '';
  $_SESSION['values']['monthswithbank']     = '';
  $_SESSION['values']['routingnumber']     = ''; 
  $_SESSION['values']['bankaccountnumber']     = ''; 
  $_SESSION['values']['bankname']     = '';  
  $_SESSION['values']['bankphone']     = '';   
  $_SESSION['values']['javascriptdisabled'] = '0';
  $_SESSION['values']['dateofbirth']  = '';
  $_SESSION['values']['bankphone']   = '';
  
}
if (!isset($_SESSION['errors']))
{
  $_SESSION['errors']['bankAct']     = 'hidden'; 
  $_SESSION['errors']['ismilitary']  = 'hidden';
  $_SESSION['errors']['loanamount']  = 'hidden';
  $_SESSION['errors']['accounttype'] = 'hidden';
  $_SESSION['errors']['fname']       = 'hidden';
  $_SESSION['errors']['lname']       = 'hidden';
  $_SESSION['errors']['address']     = 'hidden';
  $_SESSION['errors']['apartment']   = 'hidden';
  $_SESSION['errors']['city']        = 'hidden';
  $_SESSION['errors']['state']       = 'hidden';
  $_SESSION['errors']['zip']         = 'hidden';
  $_SESSION['errors']['timeataddress'] = 'hidden';
  $_SESSION['errors']['phone']       = 'hidden';
  $_SESSION['errors']['besttime']    = 'hidden';
  $_SESSION['errors']['email']       = 'hidden';
  $_SESSION['errors']['verifyemail'] = 'hidden';
  $_SESSION['errors']['dateofbirth'] = 'hidden';
  $_SESSION['errors']['ssn']          = 'hidden';
  $_SESSION['errors']['stateid']     = 'hidden';
  $_SESSION['errors']['idstate']     = 'hidden';
  $_SESSION['errors']['homeowner']   = 'hidden';
  $_SESSION['errors']['employer']    = 'hidden';
  $_SESSION['errors']['incometype']  = 'hidden';
  $_SESSION['errors']['employerphone']  = 'hidden';
  $_SESSION['errors']['monthsemmployed']  = 'hidden';
  $_SESSION['errors']['howoftenpaid']     = 'hidden';
  $_SESSION['errors']['lastpaydate']      = 'hidden';
  $_SESSION['errors']['nextpaydate']      = 'hidden';
  $_SESSION['errors']['paydateafternext']      = 'hidden';
  $_SESSION['errors']['receivepaycheck']  = 'hidden';
  $_SESSION['errors']['selectmonthlyincome']  = 'hidden';
  $_SESSION['errors']['monthswithbank']     = 'hidden';
  $_SESSION['errors']['routingnumber']     = 'hidden'; 
  $_SESSION['errors']['bankaccountnumber']     = 'hidden';
  $_SESSION['errors']['bankname']     = 'hidden';  
  $_SESSION['errors']['bankphone']     = 'hidden';   
  $_SESSION['errors']['radioTerms']    = 'hidden';
}
?>