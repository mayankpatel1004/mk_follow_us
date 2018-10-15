<?php require_once("global/global.php");
if(isset($_POST["submit_settings"]))
{
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_facebook_url"]."' WHERE option_name = 'mk_facebook_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_twitter_url"]."' WHERE option_name = 'mk_twitter_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_linkedin_url"]."' WHERE option_name = 'mk_linkedin_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_googleplus_url"]."' WHERE option_name = 'mk_googleplus_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_pinterest_url"]."' WHERE option_name = 'mk_pinterest_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_instagram_url"]."' WHERE option_name = 'mk_instagram_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_stumbleupon_url"]."' WHERE option_name = 'mk_stumbleupon_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_tumblr_url"]."' WHERE option_name = 'mk_tumblr_url'");
	$wpdb->get_results("UPDATE $strOptionTable SET option_value = '".$_POST["mk_reddit_url"]."' WHERE option_name = 'mk_reddit_url'");
	header("Location:admin.php?page=$strSettingsRedirectPagename&msg=3");
}

$url = plugins_url();
$path = plugin_dir_path( __FILE__ );
$strPluginname = basename($path); 
$strPluginTitle = "MK Follow Us";
?>
<style type="text/css">
textarea, input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], .titlewrap input, select{width:300px;}
</style>
<div class="wrap">
<div class="icon32 icon32-posts-xtn_slide_conten" id="icon-edit"><br /></div>
<h2><?php echo $strPluginTitle;?></h2>
<link href="<?php echo $url."/".$strPluginname;?>/css/styles.css" rel="stylesheet" type="text/css" />
<form name="frm" method="post" action="admin.php?page=<?php echo $strSettingsRedirectPagename;?>">
    <div class="wrapper-action wp-core-ui">
      <div class="bulkactionsdiv1 fl">
        <div class="actions bulkactions">
        	<table cellpadding="1" cellspacing="1" border="0" width="100%">
            	 <?php
				if($strMsg != "")
				{
				?>
					<tr>
						<td colspan="10"><div class="delete-record"><?php echo $strMsg;?></div></td>
					</tr>
				<?php
				}
				?>
            	<tr>
                	<td>Facebook URL</td>
                    <td><input type="text" name="mk_facebook_url" value="<?php echo get_option('mk_facebook_url');?>" /></td>
                </tr>
                <tr>
                	<td>Twitter URL</td>
                    <td><input type="text" name="mk_twitter_url" value="<?php echo get_option('mk_twitter_url');?>" /></td>
                </tr>
                <tr>
                	<td>Linkedin URL</td>
                    <td><input type="text" name="mk_linkedin_url" value="<?php echo get_option('mk_linkedin_url');?>" /></td>
                </tr>
                <tr>
                	<td>Google Plus URL</td>
                    <td><input type="text" name="mk_googleplus_url" value="<?php echo get_option('mk_googleplus_url');?>" /></td>
                </tr>
                <tr>
                	<td>Pinterest URL</td>
                    <td><input type="text" name="mk_pinterest_url" value="<?php echo get_option('mk_pinterest_url');?>" /></td>
                </tr>
                <tr>
                	<td>Instagram URL</td>
                    <td><input type="text" name="mk_instagram_url" value="<?php echo get_option('mk_instagram_url');?>" /></td>
                </tr>
                <tr>
                	<td>Stumbleupon URL</td>
                    <td><input type="text" name="mk_stumbleupon_url" value="<?php echo get_option('mk_stumbleupon_url');?>" /></td>
                </tr>
                <tr>
                	<td>Tumblr URL</td>
                    <td><input type="text" name="mk_tumblr_url" value="<?php echo get_option('mk_tumblr_url');?>" /></td>
                </tr>
                <tr>
                	<td>Reddit URL</td>
                    <td><input type="text" name="mk_reddit_url" value="<?php echo get_option('mk_reddit_url');?>" /></td>
                </tr>
         		<tr>
                	<td>&nbsp;</td>
                	<td align="left"><input type="submit" name="submit_settings" value="Save" class="add-new-h2 button-primary fl" /></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </form>  
</div>