<?php
if(!defined('WP_UNINSTALL_PLUGIN'))
{
	exit();
}
else
{
	global $wpdb;
	
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
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_facebook_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_twitter_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_linkedin_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_googleplus_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_pinterest_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_instagram_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_stumbleupon_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_tumblr_url'");
		$wpdb->get_results("DELETE FROM $strOptionTable WHERE option_name = 'mk_reddit_url'");
	}
	
}




?>