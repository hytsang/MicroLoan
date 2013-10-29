<?php
//session_start();
// session_save_path( "/home/users/web/b46/ipg.leddsoftwarecom/cgi-bin/tmp" );

class CSelectOptions
{

// Build HTML <option> tags
static function buildOptions($options, $selectedOption)
{
  foreach ($options as $value => $text)
  {
    if ($value == $selectedOption)
    {
      echo '<option value="' . $value . 
           '" selected="selected">' . $text . '</option>';
    }
    else
    {
      echo '<option value="' . $value . '">' . $text . '</option>';
    }
  }
}

public static function getAccountOptions()
{
	return self::$accountOptions;
}

public static function getYesNoOptions()
{
	return self::$yesNoOptions;
}

public static function getLoanAmountOptions()
{
	return self::$loanAmountOptions;
}

public static function getStateOptions()
{
	return self::$stateOptions;
}

public static function getTimeAtAddressOptions()
{
	return self::$timeAddressOptions;
}

public static function getBestTimeToCallOptions()
{
	return self::$bestTimeToCallOptions;
}

public static function getMonthOfBirthOptions()
{
	return self::$monthOptions;
}

public static function getDayOfBirthOptions()
{
	return self::$dayOptions;
}

public static function getYearOfBirthOptions()
{
	return self::$yearOptions;
}

public static function getIncomeTypeOptions()
{
    return self::$incomeTypeOptions;
}

public static function getMonthsEmmployedOptions()
{
    return self::$monthsEmmployedOptions;
}

public static function getHowOftenPaidOptions()
{
    return self::$howOftenPaidOptions;
}

public static function getHowPayCheckReceivedOptions()
{
    return self::$howPayCheckReceivedOptions;
}

public static function getMonthlyIncomeOptions()
{
    return self::$monthlyIncomeOptions;
}   

public static function getMonthsWithBankOtions()
{
    return self::$monthsWithBankOtions;
}

                                                                       

private static $accountOptions = array(""  => "Select","Checking" => "Checking", "Savings" => "Savings");
										   
private static $yesNoOptions   = array("" => "Select","Yes" => "Yes","No" => "No");		

private static $stateOptions    = array("" => "Select",	"AL"  => "AL","AK"  => "AK","AZ"  => "AZ","AR"  => "AR"	, "CA"  => "CA",
                                        "CO"  => "CO","CT"  => "CT","DE"  => "DE","FL"  => "FL"	, "GA" => "GA",
                                        "HI" => "HI","ID" => "ID","IL" => "IL","IN" => "IN"	, "IA" => "IA",
					"KS" => "KS","KY" => "KY","LA" => "LA","ME" => "ME"	, "MD" => "MD",
					"MA" => "MA","MI" => "MI","MN" => "MN","MS" => "MS"	, "MO" => "MO",
                                        "MT" => "MT","NE" => "NE","NV" => "NV","NH" => "NH"	, "NJ" => "NJ",
					"NM" => "NM","NY" => "NY","NC" => "NC","ND" => "ND"	, "OH" => "OH",
					"OK" => "OK","OR" => "OR","PA" => "PA","RI" => "RI"	, "SC" => "SC",
					"SD" => "SD","TN" => "TN","TX" => "TX","UT" => "UT"	, "VT" => "VT",
					"VA" => "VA","WA" => "WA","WV" => "WV","WI" => "WI"	, "WY" => "WY" );
					
private static $monthOptions    = array("" => "Select",	"Jan"  => "Jan","Feb"  => "Feb","Mar"  => "Mar","Apr"  => "Apr"	, "May"  => "May",
                                            "Jun"  => "Jun","Jul"  => "Jul","Aug"  => "Aug","Sep"  => "Sep"	, "Oct"  => "Oct",
                                            "Nov" => "Nov", "Dec"  => "Dec" );
											
private static $dayOptions      = array("" => "Select",	"1"  => "1","2"  => "2","3"  => "3","4"  => "4"	, "5"  => "5",
                                            "6"  => "6","7"  => "7","8"  => "8","9"  => "9"	, "10"  => "10",
                                            "11" => "11", "12"  => "12", "13"=>"13", "14"=>"14", "15"=>"15",
                                            "16"  => "16","17"  => "17", "18"  => "18","19"  => "19", "20"  => "20",
                                            "6"  => "6","7"  => "7","8"  => "8","9"  => "9"	, "10"  => "10",
                                            "21" => "21", "22" => "22","23" => "23", "24" => "24",
											"25" => "25", "26" => "26", "27" => "27", "28" => "28",
											"29" => "29", "30" => "30","31" => "31");	

private static $yearOptions    = array("" => "Select",	    "1994" => "1994","1993" => "1993", "1992" => "1992", "1991"  => "1991",
                                            "1990" => "1990","1989" => "1989", "1988" => "1988", "1987"  => "1997");						


private static $timeAddressOptions   = array("" => "Select","3 months or less" => "3 months or less","4-6 months" => "4-6 months",
                                                     "7-12 months" => "7-12 months",  "More than 1 year" => "More than 1 year"   );
													 
private static $bestTimeToCallOptions = array("" => "Select","Morning" => "Morning","Afternoon" => "Afternoon","Evening" => "Evening" );	

private static $incomeTypeOptions	= array("" => "Select","Employed" => "Employed","Self Employed" => "Self Employed","Social Security" => "Social Security",
                                   "Pension" => "Pension", "Disability" => "Disability");	

private static $monthsEmmployedOptions	= array("" => "Select","1 month" => "1 month","2 months" => "2 months","3 months" => "3 months",
                                   "4 to 6 months" => "4 to 6 months", "More than 1 year" => "More than 1 year");									   
				   
private static $howOftenPaidOptions  = array("" => "Select","Weekly" => "Weekly","Every 2 weeks" => "Every 2 weeks",
                                                    "Twice a month" => "Twice a month","Monthly" => "Monthly");	
                                                    

private static $howPayCheckReceivedOptions = array("" => "Select","Electronic Deposit" => "Electronic Deposit","Paper Check" => "Paper Check","Other" => "Other");	

private static $monthlyIncomeOptions = array("" => "Select","$200-$750" => "$200-$750","751-$1000" => "$751-$1000","$1001-$1250" => "$1001-$1250",
                                    "$1251-$1500"  => "$1251-$1500","$1501-$1750"   => "$1501-$1750","$1751-$2000"  => "$1751-$2000",
									"$2001-$2250"  => "$2001-$2250","$2251-$2500"   => "$2251-$2500","$2501-$2750"  => "$2501-$2750",
									"$2751-$3000" => "$2751-$3000","$3001-$3250" => "$3001-$3250","$3251-$3500" => "$3251-$3500",
									"$3501-$3750" => "$3501-$3750","$3751-$400" => "$3751-$4000","$4001-$4250" => "$4001-$4250",
									"$4251-$4500" => "$4251-$4500","$4501-$4750" => "$4501-$4750","$4751-$5000" => "$4751-$5000");
									
private static $monthsWithBankOtions	= array("" => "Select","1 month" => "1 month","2 months" => "2 months","3 months" => "3 months",
                                   "4 to 6 months" => "4 to 6 months", "More than 1 yea" => "More than 1 year");				

private static $loanAmountOptions  = array("" => "Select  Cash  Needed","$100" => "$100","$200" => "$200","$300" => "$300","$400" => "$400", "$500 or more" => "$500 or more");								   

}								   

?>