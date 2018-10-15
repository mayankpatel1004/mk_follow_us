<?php
global $wpdb;
$strSettingsRedirectPagename = "mk_follow_us";
$strOptionTable = "";
if(sizeof($wpdb->get_results("SHOW TABLES")) > 0)
{
	foreach($wpdb->get_results("SHOW TABLES") as $key => $value)
	{
		$subject = $value->Tables_in_customwordpress;
		$pattern = '/options/';
		if(preg_match($pattern, $subject, $matches))
		{
			$strOptionTable = $value->Tables_in_customwordpress;
		}
	}
}
if($strOptionTable != "")
{
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_facebook_url',option_value = 'http://www.facebook.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_twitter_url',option_value = 'http://www.twitter.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_linkedin_url',option_value = 'http://www.linkedin.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_googleplus_url',option_value = 'http://www.plug.google.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_pinterest_url',option_value = 'http://www.pinterest.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_instagram_url',option_value = 'http://www.instagram.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_stumbleupon_url',option_value = 'http://www.stumbleupon.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_tumblr_url',option_value = 'http://www.tumblr.com/',autoload = 'yes'");
	$wpdb->get_results("INSERT INTO $strOptionTable SET option_name = 'mk_reddit_url',option_value = 'http://www.reddit.com/',autoload = 'yes'");
}

if(isset($_GET["msg"]) && $_GET["msg"] == 3)
{
	$strMsg = "Records Updated Successfully";
}


function fnInsertData($arrData,$strTablename)
{
	global $wpdb;
	$strName='';
	$strValue='';
	$strNames = "";
	$strValues = "";
	
	foreach($arrData as $strName => $strValue)
	{
		$strNames .= "`$strName`,";
		$strValues .= "'".addslashes($strValue)."',";
	}
	$strNames = substr($strNames,0,strlen($strNames)-1);
	$strValues = substr($strValues,0,strlen($strValues)-1);
	
	$sqlInsert = "INSERT INTO `$strTablename` ($strNames) values ($strValues) ";
	if($wpdb->query($sqlInsert))
	{
		return  $lastid = $wpdb->insert_id;
	}
	else
	{
		echo "<div class='sqlqueryerror'>There is a problem with insert</div>";
		exit;
	}
}

function fnUpdateData($arrData,$strTablename,$intPrimaryKeyColumn,$intPrimaryKeyValue)
{
	global $wpdb;
	$sqlQuery = " UPDATE $strTablename SET ";
	foreach($arrData as $strName => $strValue)
	{
		if(strtoupper($strValue)!="NULL")
		{
			$sqlQuery .= "`$strName` = '".addslashes($strValue)."' , ";
		}
		else
		{
			$sqlQuery .= "`$strName` =  ".addslashes($strValue)." , ";
		}
	}
	$sqlQuery = substr($sqlQuery,0,strlen($sqlQuery)-2);
	$sqlQuery .= " WHERE $intPrimaryKeyColumn = $intPrimaryKeyValue " ;
	$wpdb->get_results($sqlQuery);
	return 1;
}
?>