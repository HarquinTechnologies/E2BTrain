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
	<p><strong><?php _e( 'Tel:', 'woocommerce' ); ?></strong> <?php echo $order->billing_phone;?></p>
<?php endif; ?>

<p>
<?php $item_array = $order->get_items();
//for each item, get respective product and check which type of product it is

//print out respective link and pass for class
//keep track of this	
//if it has already been printed, don't do it again (scope issue?)
$hasPrinted72HrCourse = false;
$hasPrinted63HrCourse = false;
$hasPrinted14HrCourse = false;

foreach($item_array as $item)
{
	$currProduct = $order->get_product_from_item($item);
	switch ($currProduct->get_title())
	{
		case "72 Hour Broker Pre License":
			if (!$hasPrinted72HrCourse)
			{
				echo '<br/><a href="http://e2btrain.grsband.com/?page_id=1510">Click Here For Your Broker Class</a> ' ;
				echo ' Password: RealEstate';
				$hasPrinted72HrCourse = true;
			}
			break;
		case "63 Hour Sales Associate Pre License":
			if (!$hasPrinted63HrCourse)
			{
				echo '<br/><a href="http://e2btrain.grsband.com/?page_id=1932">Click Here For Your Associate Class</a> ' ;
				echo ' Password: $aleAsscociat3!';
				$hasPrinted63HrCourse = true;
			}
			break;		
		case "14 Hour Continued Education Class":
			if (!$hasPrinted14HrCourse)
			{
				echo '<br/><a href="http://e2btrain.grsband.com/?page_id=1954">Click Here For Your Continued Education Class</a> ' ;
				echo ' Password: C0nt1ued!';
				$hasPrinted14HrCourse = true;
			}
			break;	
		default:
			break;
	}
 } ?></p>
<?php wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>