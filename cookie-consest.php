<?php
/**
 * Plugin Name: Cookie Consest
 * Plugin URI: https://avocadoweb.net
 * Description: A simple and elegant cookie consent bar for WordPress.
 * Version: 1.0
 * Author: AvocadoWeb Services
 * Author URI: https://avocadoweb.net
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function cc_enqueue_scripts() {
    wp_enqueue_style('cookie-consent-style', plugin_dir_url(__FILE__) . 'cookie-consent-style.css');
    wp_enqueue_script('cookie-consent-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cc_enqueue_scripts');

function cc_display_cookie_bar() {
    ?>
    <div id="cookie-consent-bar" class="cookie-bar">
        <p>
            This website stores cookies on your computer. These cookies are used to improve your website experience
            and provide more personalized services to you and through other media. To find out more about the cookies
            we use, see our <a href="/privacy-policy">Privacy Policy</a> for more information.
        </p>
        <div class="cookie-buttons">
            <button id="accept-cookies">Accept</button>
            <button id="reject-cookies">Reject All</button>
            <button id="cookie-settings">Settings</button>
        </div>
    </div>

    <div id="cookie-settings-modal" class="cookie-modal">
        <div class="cookie-modal-content">
            <h2>Cookie Preferences</h2>
            <div class="cookie-tabs">
                <button class="tab-button active" data-tab="necessary">Necessary</button>
                <button class="tab-button" data-tab="functional">Functional</button>
                <button class="tab-button" data-tab="analytics">Analytics</button>
                <button class="tab-button" data-tab="marketing">Marketing</button>
                <button class="tab-button" data-tab="third-party">Third Party</button>
            </div>
            <div class="cookie-tab-content active" id="necessary">
                <h3>Necessary Cookies</h3>
                <p>These cookies are required for the website to function properly. They ensure basic functionalities and security features.</p>
                <label><input type="checkbox" checked disabled> Enabled</label>
            </div>
            <div class="cookie-tab-content" id="functional">
                <h3>Functional Cookies</h3>
                <p>Functional cookies help enhance website performance and usability by remembering user preferences and settings.</p>
                <label><input type="checkbox" id="functional-cookies"> Enable Functional Cookies</label>
            </div>
            <div class="cookie-tab-content" id="analytics">
                <h3>Analytics Cookies</h3>
                <p>Analytics cookies track website traffic and user behavior to help improve website performance and content relevance.</p>
                <label><input type="checkbox" id="analytics-cookies"> Enable Analytics Cookies</label>
            </div>
            <div class="cookie-tab-content" id="marketing">
                <h3>Marketing Cookies</h3>
                <p>Marketing cookies are used to deliver personalized advertisements and track ad campaign effectiveness.</p>
                <label><input type="checkbox" id="marketing-cookies"> Enable Marketing Cookies</label>
            </div>
            <div class="cookie-tab-content" id="third-party">
                <h3>Third-Party Cookies</h3>
                <p>Third-party cookies are set by external services integrated into the website, such as social media sharing features.</p>
                <label><input type="checkbox" id="third-party-cookies"> Enable Third Party Cookies</label>
            </div>
            <div class="cookie-modal-actions">
                <button id="close-cookie-settings">Close</button>
                <button id="save-cookie-settings">Save Settings</button>
            </div>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'cc_display_cookie_bar');

// CSS Styling Update for Better Layout
file_put_contents(plugin_dir_path(__FILE__) . 'cookie-consent-style.css', "
.cookie-modal {
    width: 500px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}
.cookie-modal-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.cookie-tabs {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-bottom: 15px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}
.tab-button {
    flex-grow: 1;
    text-align: center;
    background: #f4f4f4;
    padding: 8px;
    border: none;
    cursor: pointer;
}
.tab-button.active {
    background: #0073e6;
    color: white;
}
.cookie-tab-content {
    display: none;
    width: 100%;
    padding: 10px;
    text-align: left;
}
.cookie-tab-content.active {
    display: block;
}
.cookie-modal-actions {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-top: 15px;
}
");
