 $(document).ready(function()
   {
	  $('#formApp').validate({
	  
	    
     
   		onfocusout : function(element) { $(element).valid(); } ,
	
   		rules:     {		
		              bankAct   : 'required',	
					  ismilitary: 'required',   
                      loanamount: 'required',					  
               		  fname     : 'required',		
					  lname     : 'required',	
					  address   : 'required',	
					  city      : 'required',
					  state     : 'required',	
					  zip :
					  {
					    required : true,
						digits   : true,
					  },	
					  timeataddress: 'required',
					  
					  phone: 
					  {
					    required : true,
						phoneUS  : true
					  },	
					  
					  besttime	 : 'required',
					  email:
					  {
						   required: true,
						   email: true							
				      },
					  verifyemail:
					  {
						   equalTo:'#email'
					  },	
					  
                      dateofbirth : 
					  {
						  required: true,
						  date    : true
                      },			 
					
                      ssn: 
					  {
					    required : true,
						SSN   : true
					  },
					  
					  stateid : 'required',
					  idstate: 'required',
					  homeowner : 'required',
					  employer  : 'required',
					  incometype : 'required',
					   employerphone: 
					  {
					    required : true,
						phoneUS   : true
					  },
					 
					  monthsemmployed : 'required',
					  howoftenpaid : 'required',
					  lastpaydate : 
					  {
						  required : true,
						  date     : true
					  },
					 
					  nextpaydate:
					  {
						  required : true,
						  date     : true
					  },
					 
					    
					  paydateafternext : 
					  {
						  required : true,
						  date     : true
					  },
					  
					  receivepaycheck : 'required',
					  selectmonthlyincome : 'required',
					  accounttype:'required',
					  monthswithbank:'required',
					  routingnumber:
					  {
					    required : true,
						digits   : true
					  },
					  bankaccountnumber:
					  {
					    required : true,
						digits   : true
					  },
					  bankname:'required',
					  bankphone:
					  { 
					    required : true,
						phoneUS  : true
					  },
					  rcert : 'required'
            	   },
				   
		   
  		messages:  {			         
		              bankAct   : 'Please select a value',
					  ismilitary: 'Please select a value',
					  loanamount: 'Please select a value',
              		  fname     : 'Please enter your first name',   
					  lname     : 'Please enter your last name',   
					  address   : 'Please enter your address',  
					  city      : 'Please enter your city',	
					  state     : 'Please select a state',	 
					  zip       : 'Please enter your zip code',	
					  timeataddress: 'Please select a value',
					  phone: 'Please enter phone #',
					  employerphone: 'Please enter phone #',
					  besttime	 : 'Please select a value',
					  email:     'Please enter your email',
					  verifyemail:'Please verify email',
					  dateofbirth : 'Please enter date', 
					  ssn:'Please enter social security',
					  stateid   : 'Please enter your state id',
					  idstate   : 'Please enter the state',
					  homeowner : 'Please select a value',
					  employer  : 'Please select a value',
					  incometype: 'Please select a value',
					  monthsemmployed : 'Please select a value',
					  howoftenpaid : 'Please select a value',
					  
					  lastpaydate: 'Enter last pay date',
					  nextpaydate: 'Enter next pay date',									  
					  paydateafternext: 'Enter pay date after next',									  
					  receivepaycheck : 'Please select a value' ,
					  selectmonthlyincome : 'Please select a value' ,
					  accounttype : 'Please select a value' ,
					  monthswithbank: 'Please select a value' ,
					  routingnumber: 'Please enter routing number',
					  bankaccountnumber:'Please enter bank account #',
					  bankname:'Please enter your bank name',
					  bankphone:'Please enter bank phone #',
					  rcert : 'Please accept privacy policy'
             	   },
				   
	    errorPlacement: function(error, element)
		{
            if ( element.is(":radio") || element.is(":checkbox")) 
		    {				 
                error.appendTo( element.parent());
            } 
					
			else 
			{				  
                error.insertAfter(element);		 	   
            }
        } // end errorPlacement
  } );
   } // right brace from .validate( ({
  ); // right brace from .validate( ({