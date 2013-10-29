 
 $(function()
 {
 
	$("#phone").mask("(999)999-9999");	
	$("#employerphone").mask("(999)999-9999");	
	$("#bankphone").mask("(999)999-9999");	
	
	$("#ssn").mask("999-99-9999");	
	$("#zip").mask("99999");	
    $("#routingnumber").mask("999999999");		
	
	var year = new Date().getFullYear();
			
	 $("#dateofbirth").datepicker
	 ({
        changeYear: true,
        // The year range is from the current year to 100 years before
        yearRange: (year - 60) + ":" + year,
        // The default date is january 1st fifty years before the current year
        defaultDate: year - 30
    });
	
	$.datepicker.setDefaults({onclose: function() {$(this).valid();} });
	
	$("#lastpaydate").datepicker
	({
        minDate: -60, 
		maxDate: "-1D"		
    });
		
	$('#nextpaydate').datepicker
	({
        minDate: "+1D",
		maxDate: +30		
    });
	
	
	$('#paydateafternext').datepicker
	({
        minDate: "+31D",
		maxDate: +60
    });
	
	
	
});