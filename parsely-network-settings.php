<div class="wrap">
    <h2>Site ID: <?php global $wpdb; echo $wpdb->siteid; ?></h2>
    <h2>Parse.ly - Network Settings <span id="wp-parsely_version">Version <?php echo esc_html($this::VERSION); ?></span></h2>
    <form name="parsely" method="post" action="<?php echo add_query_arg('action', 'update_'.$this::MENU_SLUG, network_admin_url('edit.php')); ?>">
        <?php wp_nonce_field( 'parsely_update_network_settings' ); ?>
        <?php settings_errors($this::OPTIONS_KEY); ?>

        <h3>Network Settings</h3>
        <table class="form-table">
            <tr>
                <th scope="row">
                    Override Site Settings
                    <div class="help-icons"></div>
                </th>
                <td>
                    <?php
                        $args = array('option_key' => 'override_site_settings',
                                      'help_text' => 'When checked, settings on this screen will override individual settings for all blogs. If left unchecked, these settings will have no effect. Use with caution.',
                                      'requires_recrawl' => true);
                        $this->print_binary_radio_tag($args);
                    ?>
                </td>
            </tr>
        </table>

        <?php do_settings_sections($this::OPTIONS_KEY); ?>

        <p class="submit">
            <input name="submit" type="submit" class="button-primary"
             value="<?php esc_attr_e('Save Changes'); ?>" />
        </p>
    </form>
</div>