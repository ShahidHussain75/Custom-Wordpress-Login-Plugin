<?php
/*
Plugin Name: Custom Login Plugin
Description: Replaces the default WordPress login form with a custom login form
*/

// Enqueue custom CSS styles
function custom_login_styles() {
    wp_enqueue_style('custom-login-styles', plugin_dir_url(__FILE__) . 'custom-login.css');
}
add_action('login_enqueue_scripts', 'custom_login_styles');

// Replace the default login form with a custom login form
function custom_login_form() {
    ?>
    <div class="login-form">
        <div class="svg-container">
            <!-- Add your SVG code here -->
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" fill="#ff5722" />
            </svg>
        </div>
        <h2>Login</h2>
        <?php wp_login_form(); ?>
    </div>
    <?php
}
add_action('login_form', 'custom_login_form');
