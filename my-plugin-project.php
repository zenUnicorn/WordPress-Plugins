<?php 
/**
 * Plugin Name:       Website security
 * Plugin URI:        https://example.com/plugins/Malicious-requests/
 * Description:       Protect Your Site from Malicious Requests
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shittu Olumide
 * License:           GPL v2 or later
 */

// Protect Your Site from Malicious Requests
//There are various ways to secure your website, intstead of installing a security plugin on your website.
//Add the following code snippet, once placed in your functions.php file, rejects all malicious URL requests:

global $user_ID; if($user_ID) {
    if(!current_user_can('administrator')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")) {
                @header("HTTP/1.1 414 Request-URI Too Long");
                @header("Status: 414 Request-URI Too Long");
                @header("Connection: Close");
                @exit;
        }
    }
}

