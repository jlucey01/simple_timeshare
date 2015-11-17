<?php

/**
 * Adds a meta box to the post editing screen
 */
function timeshare_custom_meta() {
    add_meta_box( 'timeshare_meta', __( 'Property Info', 'timeshare-textdomain' ), 'timeshare_meta_callback', 'timeshare', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'timeshare_custom_meta' );

add_action( 'add_meta_boxes', 'timeshare_make_wp_editor_movable', 0 );
    function timeshare_make_wp_editor_movable() {
        global $_wp_post_type_features;
        if (isset($_wp_post_type_features['timeshare']['editor']) && $_wp_post_type_features['timeshare']['editor']) {
            unset($_wp_post_type_features['timeshare']['editor']);
            add_meta_box(
                'description_sectionid',
                __('Description'),
                'timeshare_inner_custom_box',
                'timeshare', 'normal', 'high'
            );
        }
    }

    function timeshare_inner_custom_box( $post ) {
        the_editor($post->post_content);
    }

/**
 * Outputs the content of the meta box
 */

function timeshare_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'timeshare_nonce' );
    $timeshare_stored_meta = get_post_meta( $post->ID );
    ?>
<table style="width:100%">
    <tr>
        <td>
    <p>
        <?php
            $options = get_option( 'name' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="name" class="timeshare-row-title"><?php _e( 'Property Name:', 'timeshare-textdomain' )?></label>
            <select name="name" id="name">
            <?php foreach ( $names as $name ) {
            printf(
                     '<option value="%s" %s>%s</option>',
                $name,
                selected($name, $options, false),
                $name
                );
            } ?>

            </select>
    </p>
</td>
<td>
   <p>
    <?php
        $options = get_option( 'city' );
        $city_value = get_post_meta( $post_id, 'city', false );
        $names = explode( PHP_EOL, $options );
        ?>
        <label for="City" class="timeshare-row-title"><?php _e( 'City:', 'timeshare-textdomain' )?></label>
        <select name="city" id="city">
        <?php foreach ( $names as $name ) {
            printf(
                '<option value="%s" %s>%s</option>',
                $name,
                selected($name, $city_value, false),
                $name
            );
        } ?>

        </select>
</p>
</td>
</tr>
<tr>
    <td>
        <p>
        <?php
            $options = get_option( 'state' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="State" class="timeshare-row-title"><?php _e( 'State:', 'timeshare-textdomain' )?></label>
            <select name="state" id="state">
            <?php foreach ( $names as $name ) {
                printf(
                    '<option value="%s" selected="selected">%s</option>',
                    $name,
                    $name
                );
            } ?>

            </select>
    </p>
    </td>
    <td>
        <p>
        <?php
            $options = get_option( 'country' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="title" class="timeshare-row-title"><?php _e( 'Country:', 'timeshare-textdomain' )?></label>
            <select name="country" id="country">
            <?php foreach ( $names as $name ) {
                printf(
                    '<option value="%s" selected="selected">%s</option>',
                    $name,
                    $name
                );
            } ?>

            </select>
    </p>
</td>
</tr>
<tr>
    <td>

         <p>
        <?php
            $options = get_option( 'prop_num' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="title" class="timeshare-row-title"><?php _e( 'Property Number:', 'timeshare-textdomain' )?></label>
            <select name="prop_num" id="prop_num">
            <?php foreach ( $names as $name ) {
                printf(
                    '<option value="%s" selected="selected">%s</option>',
                    $name,
                    $name
                );
            } ?>

            </select>
    </p>
</td>
<td>

     <p>
        <?php
            $options = get_option( 'price' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="title" class="timeshare-row-title"><?php _e( 'Price:', 'timeshare-textdomain' )?></label>
            <select name="price" id="price">
            <?php foreach ( $names as $name ) {
                printf(
                    '<option value="%s" selected="selected">%s</option>',
                    $name,
                    $name
                );
            } ?>

            </select>
    </p>
</td>
</tr>
<tr>
    <td>
     <p>
        <?php
            $options = get_option( 'points' );
            $names = explode( PHP_EOL, $options );
            ?>
            <label for="title" class="timeshare-row-title"><?php _e( 'Points:', 'timeshare-textdomain' )?></label>
            <select name="points" id="points">
            <?php foreach ( $names as $name ) {
                printf(
                    '<option value="%s" selected="selected">%s</option>',
                    $name,
                    $name
                );
            } ?>

            </select>
    </p>
 </td>
 <td>
    <p>
    <label for="beds" class="timeshare-row-title"><?php _e( 'Bedrooms:', 'timeshare-textdomain' )?></label>
    <select name="beds" id="beds">
        <option value="1" <?php if ( isset ( $timeshare_stored_meta['beds'] ) ) selected( $timeshare_stored_meta['beds'][0], '1' ); ?>><?php _e( '1', 'timeshare-textdomain' )?></option>';
        <option value="2" <?php if ( isset ( $timeshare_stored_meta['beds'] ) ) selected( $timeshare_stored_meta['beds'][0], '2' ); ?>><?php _e( '2', 'timeshare-textdomain' )?></option>';
        <option value="3" <?php if ( isset ( $timeshare_stored_meta['beds'] ) ) selected( $timeshare_stored_meta['beds'][0], '3' ); ?>><?php _e( '3', 'timeshare-textdomain' )?></option>';
        <option value="4" <?php if ( isset ( $timeshare_stored_meta['beds'] ) ) selected( $timeshare_stored_meta['beds'][0], '4' ); ?>><?php _e( '4', 'timeshare-textdomain' )?></option>';
    </select>
</p>
</td>
</tr>
<tr>
    <td>
    <p>
    <label for="baths" class="timeshare-row-title"><?php _e( 'Bathrooms:', 'timeshare-textdomain' )?></label>
    <select name="baths" id="baths">
        <option value="1" <?php if ( isset ( $timeshare_stored_meta['baths'] ) ) selected( $timeshare_stored_meta['baths'][0], '1' ); ?>><?php _e( '1', 'timeshare-textdomain' )?></option>';
        <option value="2" <?php if ( isset ( $timeshare_stored_meta['baths'] ) ) selected( $timeshare_stored_meta['baths'][0], '2' ); ?>><?php _e( '2', 'timeshare-textdomain' )?></option>';
        <option value="3" <?php if ( isset ( $timeshare_stored_meta['baths'] ) ) selected( $timeshare_stored_meta['baths'][0], '3' ); ?>><?php _e( '3', 'timeshare-textdomain' )?></option>';
        <option value="4" <?php if ( isset ( $timeshare_stored_meta['baths'] ) ) selected( $timeshare_stored_meta['baths'][0], '4' ); ?>><?php _e( '4', 'timeshare-textdomain' )?></option>';
    </select>
</p>
</td>
<td>
<p>
    <label for="week_type" class="timeshare-row-title"><?php _e( 'Week Type:', 'timeshare-textdomain' )?></label>
    <select name="week_type" id="week_type">
        <option value="Annual" <?php if ( isset ( $timeshare_stored_meta['week_type'] ) ) selected( $timeshare_stored_meta['week_type'][0], 'Annual' ); ?>><?php _e( 'Annual', 'timeshare-textdomain' )?></option>';
        <option value="Biennial Even" <?php if ( isset ( $timeshare_stored_meta['week_type'] ) ) selected( $timeshare_stored_meta['week_type'][0], 'Biennial Even' ); ?>><?php _e( 'Biennial Even', 'timeshare-textdomain' )?></option>';
        <option value="Biennial Odd" <?php if ( isset ( $timeshare_stored_meta['week_type'] ) ) selected( $timeshare_stored_meta['week_type'][0], 'Biennial Odd' ); ?>><?php _e( 'Biennial Odd', 'timeshare-textdomain' )?></option>';
        <option value="Points" <?php if ( isset ( $timeshare_stored_meta['week_type'] ) ) selected( $timeshare_stored_meta['week_type'][0], 'Points' ); ?>><?php _e( 'Points', 'timeshare-textdomain' )?></option>';
    </select>
</p>
</td>
</tr>
<tr>
    <td>
<p>
    <label for="week" class="timeshare-row-title"><?php _e( 'Week:', 'timeshare-textdomain' )?></label>
    <select name="week" id="week">
        <option value="1" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '1' ); ?>><?php _e( '1', 'timeshare-textdomain' )?></option>';
        <option value="2" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '2' ); ?>><?php _e( '2', 'timeshare-textdomain' )?></option>';
        <option value="3" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '3' ); ?>><?php _e( '3', 'timeshare-textdomain' )?></option>';
        <option value="4" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '4' ); ?>><?php _e( '4', 'timeshare-textdomain' )?></option>';
        <option value="5" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '5' ); ?>><?php _e( '5', 'timeshare-textdomain' )?></option>';
        <option value="6" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '6' ); ?>><?php _e( '6', 'timeshare-textdomain' )?></option>';
        <option value="7" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '7' ); ?>><?php _e( '7', 'timeshare-textdomain' )?></option>';
        <option value="8" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '8' ); ?>><?php _e( '8', 'timeshare-textdomain' )?></option>';
        <option value="9" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '9' ); ?>><?php _e( '9', 'timeshare-textdomain' )?></option>';
        <option value="10" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '10' ); ?>><?php _e( '10', 'timeshare-textdomain' )?></option>';
        <option value="11" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '11' ); ?>><?php _e( '11', 'timeshare-textdomain' )?></option>';
        <option value="12" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '12' ); ?>><?php _e( '12', 'timeshare-textdomain' )?></option>';
        <option value="13" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '13' ); ?>><?php _e( '13', 'timeshare-textdomain' )?></option>';
        <option value="14" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '14' ); ?>><?php _e( '14', 'timeshare-textdomain' )?></option>';
        <option value="15" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '15' ); ?>><?php _e( '15', 'timeshare-textdomain' )?></option>';
        <option value="16" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '16' ); ?>><?php _e( '16', 'timeshare-textdomain' )?></option>';
        <option value="17" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '17' ); ?>><?php _e( '17', 'timeshare-textdomain' )?></option>';
        <option value="18" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '18' ); ?>><?php _e( '18', 'timeshare-textdomain' )?></option>';
        <option value="19" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '19' ); ?>><?php _e( '19', 'timeshare-textdomain' )?></option>';
        <option value="20" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '20' ); ?>><?php _e( '20', 'timeshare-textdomain' )?></option>';
        <option value="21" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '21' ); ?>><?php _e( '21', 'timeshare-textdomain' )?></option>';
        <option value="22" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '22' ); ?>><?php _e( '22', 'timeshare-textdomain' )?></option>';
        <option value="23" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '23' ); ?>><?php _e( '23', 'timeshare-textdomain' )?></option>';
        <option value="24" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '24' ); ?>><?php _e( '24', 'timeshare-textdomain' )?></option>';
        <option value="25" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '25' ); ?>><?php _e( '25', 'timeshare-textdomain' )?></option>';
        <option value="26" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '26' ); ?>><?php _e( '26', 'timeshare-textdomain' )?></option>';
        <option value="27" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '27' ); ?>><?php _e( '27', 'timeshare-textdomain' )?></option>';
        <option value="28" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '28' ); ?>><?php _e( '28', 'timeshare-textdomain' )?></option>';
        <option value="29" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '29' ); ?>><?php _e( '29', 'timeshare-textdomain' )?></option>';
        <option value="30" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '30' ); ?>><?php _e( '30', 'timeshare-textdomain' )?></option>';
        <option value="31" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '31' ); ?>><?php _e( '31', 'timeshare-textdomain' )?></option>';
        <option value="32" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '32' ); ?>><?php _e( '32', 'timeshare-textdomain' )?></option>';
        <option value="33" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '33' ); ?>><?php _e( '33', 'timeshare-textdomain' )?></option>';
        <option value="34" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '34' ); ?>><?php _e( '34', 'timeshare-textdomain' )?></option>';
        <option value="35" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '35' ); ?>><?php _e( '35', 'timeshare-textdomain' )?></option>';
        <option value="36" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '36' ); ?>><?php _e( '36', 'timeshare-textdomain' )?></option>';
        <option value="37" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '37' ); ?>><?php _e( '37', 'timeshare-textdomain' )?></option>';
        <option value="38" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '38' ); ?>><?php _e( '38', 'timeshare-textdomain' )?></option>';
        <option value="39" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '39' ); ?>><?php _e( '39', 'timeshare-textdomain' )?></option>';
        <option value="40" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '40' ); ?>><?php _e( '40', 'timeshare-textdomain' )?></option>';
        <option value="41" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '41' ); ?>><?php _e( '41', 'timeshare-textdomain' )?></option>';
        <option value="42" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '42' ); ?>><?php _e( '42', 'timeshare-textdomain' )?></option>';
        <option value="43" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '43' ); ?>><?php _e( '43', 'timeshare-textdomain' )?></option>';
        <option value="44" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '44' ); ?>><?php _e( '44', 'timeshare-textdomain' )?></option>';
        <option value="45" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '45' ); ?>><?php _e( '45', 'timeshare-textdomain' )?></option>';
        <option value="46" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '46' ); ?>><?php _e( '46', 'timeshare-textdomain' )?></option>';
        <option value="47" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '47' ); ?>><?php _e( '47', 'timeshare-textdomain' )?></option>';
        <option value="48" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '48' ); ?>><?php _e( '48', 'timeshare-textdomain' )?></option>';
        <option value="49" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '49' ); ?>><?php _e( '49', 'timeshare-textdomain' )?></option>';
        <option value="50" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '50' ); ?>><?php _e( '50', 'timeshare-textdomain' )?></option>';
        <option value="51" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '51' ); ?>><?php _e( '51', 'timeshare-textdomain' )?></option>';
        <option value="52" <?php if ( isset ( $timeshare_stored_meta['week'] ) ) selected( $timeshare_stored_meta['week'][0], '52' ); ?>><?php _e( '52', 'timeshare-textdomain' )?></option>';
    </select>
</p>
</td>
</tr>
</table>

<?php   
}


/**
 * Saves the custom meta input
 */
function timeshare_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'timeshare_nonce' ] ) && wp_verify_nonce( $_POST[ 'timeshare_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
   // Checks for input and saves if needed
    if( isset( $_POST[ 'name' ] ) ) {
    update_post_meta( $post_id, 'name', $_POST[ 'name' ] );
}
    if( isset( $_POST[ 'city' ] ) ) {
        update_post_meta( $post_id, 'city', sanitize_text_field( $_POST[ 'city' ] ) );
    }

     if( isset( $_POST[ 'state' ] ) ) {
        update_post_meta( $post_id, 'state', sanitize_text_field( $_POST[ 'state' ] ) );
    }

     if( isset( $_POST[ 'country' ] ) ) {
        update_post_meta( $post_id, 'country', sanitize_text_field( $_POST[ 'country' ] ) );
    }
    if( isset( $_POST[ 'prop_num' ] ) ) {
        update_post_meta( $post_id, 'prop_num', sanitize_text_field( $_POST[ 'prop_num' ] ) );
    }

    if( isset( $_POST[ 'price' ] ) ) {
        update_post_meta( $post_id, 'price', sanitize_text_field( $_POST[ 'price' ] ) );
    }

    if( isset( $_POST[ 'points' ] ) ) {
        update_post_meta( $post_id, 'points', sanitize_text_field( $_POST[ 'points' ] ) );
    }

    // Checks for input and saves if needed
    if( isset( $_POST[ 'beds' ] ) ) {
    update_post_meta( $post_id, 'beds', $_POST[ 'beds' ] );
}

 // Checks for input and saves if needed
    if( isset( $_POST[ 'baths' ] ) ) {
    update_post_meta( $post_id, 'baths', $_POST[ 'baths' ] );
}

// Checks for input and saves if needed
    if( isset( $_POST[ 'week_type' ] ) ) {
    update_post_meta( $post_id, 'week_type', $_POST[ 'week_type' ] );
}

// Checks for input and saves if needed
    if( isset( $_POST[ 'week' ] ) ) {
    update_post_meta( $post_id, 'week', $_POST[ 'week' ] );
}
 
}
add_action( 'save_post', 'timeshare_meta_save' );


/**
 * Adds the meta box stylesheet when appropriate
 */
function timeshare_admin_styles(){
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style( 'timeshare_meta_box_styles', plugin_dir_url( __FILE__ ) . 'css/meta-box-styles.css' );
    }
}
add_action( 'admin_print_styles', 'timeshare_admin_styles' );
?>