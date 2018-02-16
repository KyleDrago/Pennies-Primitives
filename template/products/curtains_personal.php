<?php
function add_custom_curtains_p_field() {
 global $product;

   if ( $product->get_id() !== 9 ) {
       return;
 }
 do_action('ddd_add_personalization_input');
 do_action('ddd_add_pattern_selection_input', true);
 do_action('ddd_add_color_selection_input');
}
add_action( 'woocommerce_before_variations_form', 'add_custom_curtains_p_field', 10, 1);

$pid = 9;

//Add custom item - color selection
$select_box = 'color-select-box';
$display_title = 'Stripe Color';
add_filter( 'woocommerce_add_cart_item_data', function ($cart_item_data, $product_id, $variation_id, $quantity) use ($select_box, $pid) {
  return ddd_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity, $select_box, $pid);
}, 10, 4);

add_filter( 'woocommerce_get_item_data', function ($item_data, $cart_item) use ($select_box, $display_title, $pid) {
  return ddd_display_custom_cart( $item_data, $cart_item, $select_box, $display_title, $pid);
}, 10, 2);

add_filter( 'woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values, $order) use ($select_box, $display_title, $pid) {
  return ddd_add_custom_data_to_order( $item, $cart_item_key, $values, $order, $select_box, $display_title, $pid);
}, 10, 4);

//Add custom item - pattern
$select_box = 'pattern-select-box';
$display_title = 'Pattern';
add_filter( 'woocommerce_add_cart_item_data', function ($cart_item_data, $product_id, $variation_id, $quantity) use ($select_box, $pid) {
  return ddd_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity, $select_box, $pid);
}, 10, 4);

add_filter( 'woocommerce_get_item_data', function ($item_data, $cart_item) use ($select_box, $display_title, $pid) {
  return ddd_display_custom_cart( $item_data, $cart_item, $select_box, $display_title, $pid);
}, 10, 2);

add_filter( 'woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values, $order) use ($select_box, $display_title, $pid) {
  return ddd_add_custom_data_to_order( $item, $cart_item_key, $values, $order, $select_box, $display_title, $pid);
}, 10, 4);

//Add custom item - personalization
$select_box = 'personalized-text';
$display_title = 'Personalization';
add_filter( 'woocommerce_add_cart_item_data', function ($cart_item_data, $product_id, $variation_id, $quantity) use ($select_box, $pid) {
  return ddd_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity, $select_box, $pid);
}, 10, 4);

add_filter( 'woocommerce_get_item_data', function ($item_data, $cart_item) use ($select_box, $display_title, $pid) {
  return ddd_display_custom_cart( $item_data, $cart_item, $select_box, $display_title, $pid);
}, 10, 2);

add_filter( 'woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values, $order) use ($select_box, $display_title, $pid) {
  return ddd_add_custom_data_to_order( $item, $cart_item_key, $values, $order, $select_box, $display_title, $pid);
}, 10, 4);

?>
