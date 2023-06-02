<?php
/*
Plugin Name: Custom Login Page
Plugin URI: https://example.com/
Description: Customizes the WordPress login page
Version: 1.0
Author: Your Name
Author URI: https://example.com/
License: GPL2
*/

// Remove default CSS from the login page
function remove_default_login_css() {
    wp_deregister_style( 'login' );
    wp_deregister_style( 'wp-admin' );
    wp_deregister_style( 'buttons' );
}
add_action( 'login_enqueue_scripts', 'remove_default_login_css' );


// Add custom CSS to the login page
function custom_login_styles() {
    wp_enqueue_style( 'custom-login-styles', plugin_dir_url( __FILE__ ) . 'css/login-style.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_styles' );

// Add custom HTML to the login form
function custom_login_form() {
    $redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : home_url();
    ?>
  


	
	<div class="inputGroup inputGroup1">
		<label for="loginEmail" id="loginEmailLabel"><?php _e( 'Username or email address', 'custom-login-page' ); ?></label>
		<input type="text" name="log" id="loginEmail" maxlength="254" />
		<p class="helper helper1">email@domain.com</p>
	</div>
	<div class="inputGroup inputGroup2">
		<label for="loginPassword" id="loginPasswordLabel"><?php _e( 'Password', 'custom-login-page' ); ?></label>
		<input type="password" name="pwd" id="loginPassword" />
		<label id="showPasswordToggle" for="showPasswordCheck">Show
			<input id="showPasswordCheck" type="checkbox"/>
			<div class="indicator"></div>
		</label>
	</div>
	<div class="inputGroup inputGroup3 donthide">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Log In', 'custom-login-page' ); ?>" />
        <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
    </div>
    
      
    <?php
}
add_action( 'login_form', 'custom_login_form' );


// Add custom HTML to the registration form
function custom_register_form() {
    ?>
    <div class="custom_register_form">
 
    <p class="register-username">
        <label for="user_login"><?php _e( 'Username', 'custom-login-page' ); ?> <span class="required">*</span></label>
        <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( wp_unslash( $_POST['user_login'] ) ); ?>" size="20" autocapitalize="none" autocomplete="username">
    </p>
    
    
    <p class="register-email">
        <label for="user_email"><?php _e( 'Email', 'custom-login-page' ); ?> <span class="required">*</span></label>
        <input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr( wp_unslash( $_POST['user_email'] ) ); ?>" size="25" autocomplete="email">
    </p>
    </div>
    <?php
    // Add custom JavaScript to the registration page
    ?>
    <script>
        // Your custom JavaScript code goes here
    </script>
    <?php
}
add_action( 'register_form', 'custom_register_form' );

// Add custom HTML to the lost password form
function custom_lostpassword_form() {
    ?>
    <div class="custom_register_form">
    <p class="lostpassword-username">
        <label for="user_login"><?php _e( 'Username or email', 'custom-login-page' ); ?> <span class="required">*</span></label>
        <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( wp_unslash( $_['user_login'] ) ); ?>" size="20" autocapitalize="off" />
    </p>
    </div>
    <?php
    // Add custom JavaScript to the lost password page
    ?>
    <script>
        // Your custom JavaScript code goes here
    </script>
    <?php
}
add_action( 'lostpassword_form', 'custom_lostpassword_form' );


// Add custom JavaScript to the login page
function custom_login_scripts() {
   wp_enqueue_script( 'custom-login-scripts', plugin_dir_url( __FILE__ ) . 'js/TweenMax.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'custom-login-scripts2', plugin_dir_url( __FILE__ ) . 'js/login-script.js', array( 'jquery' ), '2.0', true );
}
add_action( 'login_enqueue_scripts', 'custom_login_scripts' );
