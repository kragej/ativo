<?php
/*
Plugin Name: Stripe by Ativo
Plugin URI:  http://ativo.dk/stripe
Description: Stripe integration
Version:     1.0
Author:      Ativo
Author URI:  http://ativo.dk
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once('lib/stripe-php/init.php');

const TEST_PRIVATE_KEY_OPT_NAME = 'ativo_stripe_test_private_key';
const TEST_PRIVATE_KEY_FIELD_NAME = 'test_private_key';

const TEST_PUBLIC_KEY_OPT_NAME = 'ativo_stripe_test_public_key';
const TEST_PUBLIC_KEY_FIELD_NAME = 'test_public_key';

const PROD_PRIVATE_KEY_OPT_NAME = 'ativo_stripe_prod_private_key';
const PROD_PRIVATE_KEY_FIELD_NAME = 'prod_private_key';

const PROD_PUBLIC_KEY_OPT_NAME = 'ativo_stripe_prod_public_key';
const PROD_PUBLIC_KEY_FIELD_NAME = 'prod_public_key';

const ENV_SETTING_OPT_NAME = 'ativo_stripe_env_setting';
const ENV_SETTING_FIELD_NAME = 'env_setting';

function stripe_form ($attributes) {
	
	$env = get_option( ENV_SETTING_OPT_NAME );
	if ($env == null) {
		$env = 'TEST';
	}
	
	if ($env == 'LIVE') {
		$publishable_key = get_option( PROD_PUBLIC_KEY_OPT_NAME );
	} else {
		$publishable_key = get_option( TEST_PUBLIC_KEY_OPT_NAME );
	}
	
	$receipt_page_id = $attributes['receiptpage'];
	$receipt_page_uri = get_page_link($receipt_page_id);
	
	return '
	<form action="'.$receipt_page_uri.'" method="POST">
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="'.$publishable_key.'"
			data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			data-name="Ativo"
			data-currency="dkk"
			data-allow-remember-me="false"
			data-description="Ativo Serviceaftale (DKK 300/md.)"
			data-panel-label="Tilmeld"
			data-label="Betal for serviceaftale">
		</script>
	</form>';
}

function register_payment() {
	if (isset($_POST['stripeToken'])) {
		\Stripe\Stripe::setApiKey('sk_test_eaW0vUCSReecjw3ZRbJLseSp');
		$token = $_POST['stripeToken'];
		$email = $_POST['stripeEmail'];
		
		$customer = \Stripe\Customer::create(array(
			"source" => $token,
			"plan" => "service",
			"email" => $email
		));
	}
}

function settings_menu() {
	add_options_page('Ativo Stripe Settings', 'Stripe Settings', 'manage_options', 'ativo-settings', 'settings_menu_content');
}

function settings_menu_content() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	$test_private_key_val = get_option( TEST_PRIVATE_KEY_OPT_NAME );
	$test_public_key_val = get_option( TEST_PUBLIC_KEY_OPT_NAME );
	$prod_private_key_val = get_option( PROD_PRIVATE_KEY_OPT_NAME );
	$prod_public_key_val = get_option( PROD_PUBLIC_KEY_OPT_NAME );
	$env_setting_val = get_option( ENV_SETTING_OPT_NAME );
	
	$hidden_field_name = 'secret_hidden_field';
	
	if (isset($_POST[$hidden_field_name]) && $_POST[$hidden_field_name] == 'Y') {
		$test_private_key_val 	= $_POST[TEST_PRIVATE_KEY_FIELD_NAME];
		$test_public_key_val 	= $_POST[TEST_PUBLIC_KEY_FIELD_NAME];
		$prod_private_key_val 	= $_POST[PROD_PRIVATE_KEY_FIELD_NAME];
		$prod_public_key_val 	= $_POST[PROD_PUBLIC_KEY_FIELD_NAME];
		$env_setting_val		= $_POST[ENV_SETTING_FIELD_NAME];
		
		update_option(TEST_PRIVATE_KEY_OPT_NAME, $test_private_key_val);
		update_option(TEST_PUBLIC_KEY_OPT_NAME, $test_public_key_val);
		update_option(PROD_PRIVATE_KEY_OPT_NAME, $prod_private_key_val);
		update_option(PROD_PUBLIC_KEY_OPT_NAME, $prod_public_key_val);
		update_option(ENV_SETTING_OPT_NAME, $env_setting_val);
?>
<div class="updated"><p><strong><?php _e('settings saved.', 'ativo-settings' ); ?></strong></p></div>
<?php
	}
	
?>
<div class="wrap">
<h2><?php echo __( 'Stripe Settings', 'ativo-settings' ); ?></h2>
<form name="stripesettings" method="POST" action="">
	<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="<?php echo TEST_PRIVATE_KEY_FIELD_NAME; ?>"><?php _e("Stripe TEST secret key:", 'ativo-settings' ); ?></th>
				<td><input type="text" name="<?php echo TEST_PRIVATE_KEY_FIELD_NAME; ?>" value="<?php echo $test_private_key_val; ?>" size="35" maxlength="32"></td>
			</tr>
			<tr>
				<th><label for="<?php echo TEST_PUBLIC_KEY_FIELD_NAME; ?>"><?php _e("Stripe TEST publishable key:", 'ativo-settings' ); ?></th>
				<td><input type="text" name="<?php echo TEST_PUBLIC_KEY_FIELD_NAME; ?>" value="<?php echo $test_public_key_val; ?>" size="35" maxlength="32"></td>
			</tr>
			<tr>
				<th><label for="<?php echo PROD_PRIVATE_KEY_FIELD_NAME; ?>"><?php _e("Stripe LIVE secret key:", 'ativo-settings' ); ?></th>
				<td><input type="text" name="<?php echo PROD_PRIVATE_KEY_FIELD_NAME; ?>" value="<?php echo $prod_private_key_val; ?>" size="35" maxlength="32"></td>
			</tr>
			<tr>
				<th><label for="<?php echo PROD_PUBLIC_KEY_FIELD_NAME; ?>"><?php _e("Stripe LIVE publishable key:", 'ativo-settings' ); ?></th>
				<td><input type="text" name="<?php echo PROD_PUBLIC_KEY_FIELD_NAME; ?>" value="<?php echo $prod_public_key_val; ?>" size="35" maxlength="32"></td>
			</tr>
			<tr>
				<th><?php _e("Stripe TEST/LIVE", 'ativo-settings' ); ?></th>
				<td>
					<fieldset>
						<p>
							<label>
								<input name="<?php echo ENV_SETTING_FIELD_NAME; ?>" type="radio" value="TEST" <?php if ($env_setting_val == 'TEST' || $env_setting_val == null) echo 'checked="checked"'; ?>>
								TEST
							</label>
							<br>
							<label>
								<input name="<?php echo ENV_SETTING_FIELD_NAME; ?>" type="radio" value="LIVE" <?php if ($env_setting_val == 'LIVE') echo 'checked="checked"'; ?>>
								LIVE
							</label>
						</p>
					</fieldset>
				</td>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
	</p>
</form>

<?php
}

add_shortcode('stripeform', 'stripe_form');
add_action( 'init', 'register_payment' );
add_action( 'admin_menu', 'settings_menu' );
?>