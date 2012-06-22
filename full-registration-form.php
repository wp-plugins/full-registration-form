<?php
/*
Plugin Name: Full Registration Form
Plugin URL: http://www.horttcore.de/wordpress/full-registration-form/
Description: Displays all profile fields in the registration form
Version: 1.0
Author: Ralf Hortt
Author URI: http://www.horttcore.de/
*/ 



/**
* 
*/
class Full_Registration_Form
{



	/**
	 * Plugin Options
	 *
	 * @var array
	 **/
	public $options;
	


	/**
	 * Constructor
	 *
	 * @access public
	 * @author Ralf Hortt
	 * @todo Options for easier customization
	 **/
	function __construct()
	{
		/*
		$this->options = array(
			'description' => TRUE,
			'first_name' => TRUE,
			'last_name' => TRUE,
			'nickname' => TRUE,
			'url' => TRUE
		);
		*/

		add_action( 'register_form', array( $this, 'user_profile' ) ); 			// Add "#" if user can fill out the form on registration.
		add_filter( 'pre_user_description', array( $this, 'description' ) );	// Add "#" if user can fill out the form on registration.
		add_filter( 'pre_user_first_name', array( $this, 'first_name' ) );		// Add "#" if user can fill out the form on registration.
		add_filter( 'pre_user_last_name', array( $this, 'last_name' ) );		// Add "#" if user can fill out the form on registration.
		add_filter( 'pre_user_nickname', array( $this, 'nickname' ) );			// Add "#" if user can fill out the form on registration.
		add_filter( 'pre_user_url', array( $this, 'url' ) );					// Add "#" if user can fill out the form on registration.
	}



	/**
	 * URL
	 *
	 * @access public
	 * @param str $description Description
	 * @return str Description
	 * @author Ralf Hortt
	 **/
	public function description( $description )
	{
		$description = ($_POST['description']) ? $_POST['description'] : $description;
		return $description;
	}



	/**
	 * First Name
	 *
	 * @access public
	 * @param str $first_name First Name
	 * @return str First Name
	 * @author Ralf Hortt
	 **/
	public function first_name( $first_name )
	{
		$first_name = ($_POST['first_name']) ? $_POST['first_name'] : $first_name;
		return $first_name;
	}



	/**
	 * Last Name
	 *
	 * @access public
	 * @param str $last_name Last Name
	 * @return str Last Name
	 * @author Ralf Hortt
	 **/
	public function last_name( $last_name )
	{
		$last_name = ($_POST['last_name']) ? $_POST['last_name'] : $last_name;
		return $last_name;
	}



	/**
	 * Nickname
	 *
	 * @access public
	 * @param str $nickname Nickname
	 * @return str Nickname
	 * @author Ralf Hortt
	 **/
	public function nickname( $nickname )
	{
		$url = ($_POST['nickname']) ? $_POST['nickname'] : $nickname;
		return $nickname;
	}



	/**
	 * URL
	 *
	 * @access public
	 * @param str $url URL
	 * @return str URL
	 * @author Ralf Hortt
	 **/
	public function url( $url )
	{
		$url = ($_POST['user_url']) ? $_POST['user_url'] : $url;
		return $url;
	}



	/**
	 * Show fields in registration form
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt
	 * @todo Options for easier customization
	 **/
	public function user_profile()
	{
		?>

		<p><label for="first_name"><?php _e('First Name')?><br />
		<input name="first_name" type="text" size="39" tabindex="30" id="first_name" value="" /></label></p>
		
		<p><label for="last_name"><?php _e('Last Name')?><br />
		<input name="last_name" type="text" size="39" tabindex="40" id="last_name" value="" /></label></p>
		
		<p><label for="nickname"><?php _e('Nickname')?><br />
		<input name="nickname" type="text" size="39" tabindex="50" id="nickname" value="" /></label></p>

		<p><label for="user_url"><?php _e('Website') ?><br />
		<input type="text" name="user_url" size="39" tabindex="60" id="user_url" value="" /></label></p>

		<!-- 
		<p><label for="aim"><?php _e('AIM')?></label><br />
		<input name="aim" id="aim"  style="width: 100%" /></p>
		
		<p><label for="yim"><?php _e('Yahoo IM')?></label><br />
		<input name="yim" id="yim"  style="width: 100%" /></p>
		
		<p><label for="jabber"><?php _e('Jabber / Google Talk')?></label><br />
		<input name="jabber" id="jabber"  style="width: 100%" /></p>
		-->

		<p><label for="description"><?php _e('Biography')?></label><br />
		<textarea name="description" cols="39" rows="10" tabindex="70" id="description"></textarea></p>
		<?
	}


}
new Full_Registration_Form;
?>