<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
<?php // list_registered_scripts(); ?>
<?php // list_script_handles(); ?>
<?php /*
<form class="dummy-form" id="frontend-checkout">
	<div class="frontend-checkout-breadcrumb">
		<h3>Cart</h3>
		<ul>
			<li><a class="frontend-customer-info">Customer Information</a></li>
			<li><a class="frontend-shipping">Shipping Method</a></li>
			<li><a class="frontend-payment">Payment Method</a></li>
		</ul>
	</div>
	<ul class="frontend-checkout-sections">
		<li id="frontend-customer-info">
			<h2>Customer Information</h2>
			<div class="field-input-wrapper">
				<label for="frontend-email">Email</label>
				<input id="frontend-email" type="email" placeholder="Email" />
			</div>
			<h2>Shipping Address</h2>
			<div class="field-input-wrapper">
				<label for="frontend-ship-first-name">First name</label>
				<input id="frontend-ship-first-name" type="text" placeholder="First name" />
			</div>
			<div class="field-input-wrapper">
				<label for="frontend-ship-last-name">Last name</label>
				<input id="frontend-ship-last-name" type="text" placeholder="Last name" />
			</div>
			<div class="field-input-wrapper">
				<label for="frontend-ship-company">Company (optional)</label>
				<input id="frontend-ship-company" type="text" placeholder="Company (optional)" />
			</div>
			<div class="field-input-wrapper">
				<label for="frontend-ship-address-1">Address</label>
				<input id="frontend-ship-address-1" type="text" placeholder="Address" />
			</div>
			<div class="field-input-wrapper">
				<label for="frontend-ship-address-2">Apt, suite, etc. (optional)</label>
				<input id="frontend-ship-address-2" type="text" placeholder="Apt, suite, etc. (optional)" />
			</div>
			<div class="field-input-wrapper">
				<label for="frontend-ship-city">City</label>
				<input id="frontend-ship-city" type="text" placeholder="City" />
			</div>
			<?php woocommerce_form_field( $checkout->checkout_fields['shipping']->shipping_country, array('type'=>'country', 'label'=>'Country','required'=>'1','id'=>'frontend-ship-country','class'=>array(0=>'form-row-wide',1=>'address-field',2=>'update_totals_on_change')), $checkout->get_value( $checkout->checkout_fields['shjipping']->shipping_country ) ); ?>
			<?php woocommerce_form_field( $checkout->checkout_fields['shipping']->shipping_state, array('type'=>'state', 'label'=>'State','required'=>'1','id'=>'frontend-ship-state','class'=>array(0=>'form-row-first',1=>'address-field')), $checkout->get_value( $checkout->checkout_fields['shipping']->shipping_state ) ); ?>
			<pre>
			<?php print_r($checkout); ?>
			</pre>
			<div class="field-input-wrapper">
				<label for="frontend-ship-zip">Zip code</label>
				<input id="frontend-ship-zip" type="text" placeholder="Zip code" />
			</div>
		</li>
		<li id="frontend-shipping">
		</li>
		<li id="frontend-payment">
		</li>
	<ul>
</form>
*/ ?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
