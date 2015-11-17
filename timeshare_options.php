<?php
// create custom plugin settings menu
add_action('admin_menu', 'my_timeshare_create_menu');

function my_timeshare_create_menu() {

    //create new top-level menu
    add_submenu_page('edit.php?post_type=timeshare', 'Custom Post Type Admin', 'Custom Settings', 'edit_posts', basename(__FILE__), 'my_timeshare_settings_page');
    

    //call register settings function
    add_action( 'admin_init', 'register_timeshare_plugin_settings' );
}


function register_timeshare_plugin_settings() {
    //register our settings
    register_setting( 'my-timeshare-settings-group', 'name' );
    register_setting( 'my-timeshare-settings-group', 'prop_num' );
    register_setting( 'my-timeshare-settings-group', 'price' );
    register_setting( 'my-timeshare-settings-group', 'points' );
    register_setting( 'my-timeshare-settings-group', 'city' );
    register_setting( 'my-timeshare-settings-group', 'state' );
    register_setting( 'my-timeshare-settings-group', 'country' );
}

function my_timeshare_settings_page() {
?>
<div class="wrap">
<h2>Timeshare Settings</h2>
    <hr />
<form method="post" action="options.php">
    <?php settings_fields( 'my-timeshare-settings-group' ); ?>
    <?php do_settings_sections( 'my-timeshare-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Name</th>
        <td><textarea id="name" name="name" rows="5" cols="36"><?php echo esc_attr( get_option('name') ); ?></textarea></td>
        

        
        <th scope="row">City</th>
        <td><textarea id="city" name="city" rows="5" cols="36"><?php echo esc_attr( get_option('city') ); ?></textarea></td>
        

       
        <th scope="row">State</th>
        <td><textarea id="state" name="state" rows="5" cols="36"><?php echo esc_attr( get_option('state') ); ?></textarea></td>
        </tr>

      <tr valign="top">
        <th scope="row">Country</th>
        <td><textarea id="country" name="country" rows="5" cols="36"><?php echo esc_attr( get_option('country') ); ?></textarea></td>
       

       
        <th scope="row">Property Number</th>
        <td><textarea id="prop_num" name="prop_num" rows="5" cols="36"><?php echo esc_attr( get_option('prop_num') ); ?></textarea></td>
       
        
       
        <th scope="row">Price</th>
        <td><textarea id="price" name="price" rows="5" cols="36"><?php echo esc_attr( get_option('price') ); ?></textarea></td>
    </tr>

    <tr valign="top">
        <th scope="row">Points</th>
        <td><textarea id="points" name="points" rows="5" cols="36"><?php echo esc_attr( get_option('points') ); ?></textarea></td>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>