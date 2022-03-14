<?php
/*
Plugin Name: Test Plugin
Version: 1.0
Author: Trent
*/

function audere_add_settings_page() {
    add_options_page( 'Company Information', 'Company Information', 'manage_options', 'audere-test-plugin', 'audere_render_plugin_settings_page' );
}
add_action( 'admin_menu', 'audere_add_settings_page' );

function audere_render_plugin_settings_page() {
    ?>
    <form action="options.php" method="post">
        <?php
        settings_fields( 'audere_test_plugin_options' );
        do_settings_sections( 'audere_test_plugin' ); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
    </form>
    <?php
}

function audere_register_settings() {
    register_setting( 'audere_test_plugin_options', 'audere_test_plugin_options', 'audere_test_plugin_options_validate' );
    add_settings_section( 'api_settings', 'Company Information', 'audere_plugin_section_text', 'audere_test_plugin' );

    add_settings_field( 'audere_plugin_setting_company_name', 'Company Name', 'audere_plugin_setting_company_name', 'audere_test_plugin', 'api_settings' );
    add_settings_field( 'audere_plugin_setting_email', 'Email', 'audere_plugin_setting_email', 'audere_test_plugin', 'api_settings' );
    add_settings_field( 'audere_plugin_setting_telephone', 'Telephone', 'audere_plugin_setting_telephone', 'audere_test_plugin', 'api_settings' );
}
add_action( 'admin_init', 'audere_register_settings' );

function audere_plugin_section_text() {
    echo '<p>Here you can set your company information</p>';
}

function audere_plugin_setting_company_name() {
    $options = get_option( 'audere_test_plugin_options' );
    echo "<input id='audere_plugin_setting_company_name' name='audere_test_plugin_options[company_name]' type='text' value='" . esc_attr( $options['company_name'] ) . "' />";
}

function audere_plugin_setting_email() {
    $options = get_option( 'audere_test_plugin_options' );
    echo "<input id='audere_plugin_setting_email' name='audere_test_plugin_options[email]' type='text' value='" . esc_attr( $options['email'] ) . "' />";
}

function audere_plugin_setting_telephone() {
    $options = get_option( 'audere_test_plugin_options' );
    echo "<input id='audere_plugin_setting_telephone' name='audere_test_plugin_options[telephone]' type='text' value='" . esc_attr( $options['telephone'] ) . "' />";
}