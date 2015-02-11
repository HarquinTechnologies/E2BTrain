<?php
/**
 * Customer completed order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( "Hi there. Your recent order on %s has been completed. Your order details are shown below for your reference:", 'woocommerce' ), get_option( 'blogname' ) ); ?></p>

<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>

<h2><?php echo __( 'Order:', 'woocommerce' ) . ' ' . $order->get_order_number(); ?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( true, false, true ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>

<?php if ($order->billing_email) : ?>
	<p><strong><?php _e( 'Email:', 'woocommerce' ); ?></strong> <?php echo $order->billing_email; ?></p>
<?php endif; ?>
<?php if ($order->billing_phone) : ?>
	<p><strong><?php _e( 'Tel:', 'woocommerce' ); ?></strong> <?php echo $order->billing_phone; $item_array = $order->get_items();
//for each item, get respective product and check which type of product it is

//print out respective link and pass for class
//keep track of this	
//if it has already been printed, don't do it again (scope issue?)
foreach($item_array as $item)
{
	$currProduct = $order->get_product_from_item($item);
	switch ($currProduct->get_title())
	{
		case "72 Hour Broker Pre License":
			echo 'Class Link is: <a href="http://www.e2btrain.com/72_hour">http://www.e2btrain.com/72_hour</a>' ;
			echo 'Password: RealEstate';
			break;
		case "63 Hour Sales Associate Pre License":
			echo 'Class Link is: <a href="http://www.e2btrain.com/72_hour">http://www.e2btrain.com/72_hour</a>' ;
			echo 'Password: RealEstate';
			break;
		default:
			break;
	}
	echo 'Product Title: ';
	echo $currProduct->get_title();
 }?></p>
<?php endif; ?>

<?php $item_array = $order->get_items();
//for each item, get respective product and check which type of product it is

//print out respective link and pass for class
//keep track of this	
//if it has already been printed, don't do it again (scope issue?)
foreach($item_array as $item)
{
	$currProduct = $order->get_product_from_item($item);
	switch ($currProduct->get_title())
	{
		case "72 Hour Broker Pre License":
			echo 'Class Link is: <a href="http://www.e2btrain.com/72_hour">http://www.e2btrain.com/72_hour</a>' ;
			echo 'Password: RealEstate';
			break;
		case "63 Hour Sales Associate Pre License":
			echo 'Class Link is: <a href="http://www.e2btrain.com/72_hour">http://www.e2btrain.com/72_hour</a>' ;
			echo 'Password: RealEstate';
			break;
		default:
			break;
	}
	echo 'Product Title: ';
	echo $currProduct->get_title();
 } ?>
<?php wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>