<?php
// Functions by Kyle Drago of Drago Design & Development, Dragowebdesign.com

// Add Cart Item Data ----------------------------------------------------------------------------------------------------//
// Usage:
// $select_box = 'color-select-box';
// add_filter( 'woocommerce_add_cart_item_data', function ($cart_item_data, $product_id, $variation_id, $quantity) use ($select_box, $pid) {
//   return ddd_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity, $select_box, $pid);
// }, 10, 4);

function ddd_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity, $select_box, $pid) {
  //Get selection from combo box
  $value_selected = filter_input(INPUT_POST, $select_box, FILTER_SANITIZE_SPECIAL_CHARS);
  //Check if input is valid
  if($pid !== $product_id) {
    return $cart_item_data;
  }
  if(empty($value_selected)) {
    return $cart_item_data;
  }
  //Add to selection to cart_item_data array
  $cart_item_data[$select_box] = $value_selected;
  //Return modified cart_item_data array
  return $cart_item_data;
}

// Display custom cart data in the cart ------------------------------------------------------------------------//
// Usage:
// $select_box = 'color-select-box';
// $display_title = 'Stripe Color';
// add_filter( 'woocommerce_get_item_data', function ($item_data, $cart_item) use ($select_box, $display_title, $pid) {
//   return ddd_display_custom_cart( $item_data, $cart_item, $select_box, $display_title, $pid);
// }, 10, 2);

function ddd_display_custom_cart($item_data, $cart_item, $select_box, $display_title, $pid) {
  if ( empty( $cart_item[$select_box] ) ) {
    return $item_data;
  }

  $product_id = $cart_item['product_id'];
  if ($pid !== $product_id) {
    return $item_data;
  }

  $display_name = str_replace('-', ' ', $cart_item[$select_box]);

  $item_data[] = array(
     'key'     => $display_title,
     'value'   => wc_clean( $display_name ),
     'display' => '',
  );

  return $item_data;
}

// Display custom data in order screen ---------------------------------------------------------------------------//
// Usage:
// $select_box = 'color-select-box';
// $display_title = 'Stripe Color';
// add_filter( 'woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values, $order) use ($select_box, $display_title, $pid) {
//   return ddd_add_custom_data_to_order( $item, $cart_item_key, $values, $order, $select_box, $display_title, $pid);
// }, 10, 4);

function ddd_add_custom_data_to_order( $item, $cart_item_key, $values, $order, $select_box, $display_title, $pid) {
  if ( empty( $values[$select_box] ) ) {
   return;
  }
  $product_id = $item['product_id'];
  if ($pid !== $product_id) {
    return;
  }
  $display_name = str_replace('-', ' ', $values[$select_box]);
  $item->add_meta_data( $display_title, $display_name );
}

// Change product price ------------------------------------------------------------------------------------------//
// Only functional for simple products
// Usage:
// $amount = 12;
// $id = 99;
// add_filter( 'woocommerce_product_get_price', function ($price, $product) use ($amount, $id) {
//   return product_custom_price( $price, $product, $amount, $id);
// }, 10, 2);

function product_custom_price($price, $product, $amount, $id) {
  if (empty($amount)) {
    $amount = 0;
  }
  $pid = $product->get_id();
  if ($pid == $id) {
    $custom_price = $product->get_regular_price();
    return $custom_price + $amount;
  }
}

// Add personalization input html ----------------------------------------------------------------------------------//
// Usage:
// do_action('ddd_add_personalization_input');

function add_personalization_input() {
  ?>
  <div class="personalized-select-wrapper">
    <p id='input-warning' class="input-warning">Invalid Character Entered</p>
   <label for="personalized-text">Personalization</label>
   <input type="text" class="personalized-text" id="personalized-text" name="personalized-text" placeholder="Pennies Primitives">
  </div>
  <?php
}
add_action('ddd_add_personalization_input', 'add_personalization_input', 10);

// Add color input html ----------------------------------------------------------------------------------//
// Usage:
// do_action('ddd_add_color_selection_input');

function add_color_selection_input() {
  $imageDir = content_url() . "/uploads/";
  ?>
  <div class="color-select-wrapper">
    <label for="color-select-box">Stripe Color</label>
    <select id="color-select-box" name="color-select-box" class="color-select-box">
      <option value="Linen">Linen</option>
      <option value="Pale-Daffodil">Pale Daffodil</option>
      <option value="Hydrangea-Purple">Hydrangea Purple</option>
      <option value="Wedgewood-Green">Wedgewood Green</option>
      <option value="Dark-Green">Dark Green</option>
      <option value="Barn-Red">Barn Red</option>
      <option value="French-Blue">French Blue</option>
      <option value="Navy-Blue">Navy Blue</option>
      <option value="Dark-Brown">Dark Brown</option>
      <option value="Dark-Grey">Dark Grey</option>
      <option value="Black">Black</option>
    </select>
    <img id="color-preview-image" class="color-preview-image" src="<?php echo $imageDir; ?>Linen.jpg">
   </div>
  <?php
}
add_action('ddd_add_color_selection_input', 'add_color_selection_input', 10);

// Add pattern input html ----------------------------------------------------------------------------------//
// Usage:
// TODO create more reliable $imageDir for php and js, make starting preview image decided by select combo box: done in JS
// If optional bool is set it will use personalized array
// do_action('ddd_add_pattern_selection_input', true);

function add_pattern_selection_input($pers) {
  $imageDir = content_url() . "/uploads/";

  $patternArray = array(
    "Daisypatch",
    "Anchors",
    "Boulangerie-Bee",
    "Fabrique-DeBijouterie",
    "Fabrique-Speciale",
    "Farm-Fresh",
    "Farm-Life",
    "Farmers-Market",
    "Fresh-Cut-Sunflowers",
    "Grains-1841",
    "Grains-No4",
    "Green-Acres-Horse-Ranch",
    "Homespun-Wool-Co",
    "Homestead-Poultry-Feed",
    "Horse-Shoe-Farms",
    "L-hotel-Des-Royales",
    "Organic-Chicken-Feed",
    "Principe-Des-Fleurs",
    "Reindeer-Grains",
    "The-Country-Mill",
    'Blueberry-Orchard',
    'Moose',
    'Cattle-Feed',
    'Cattle-Feed-Curved'
  );

  if (!empty($pers)) {
    $patternArray = array(
      "Green-Acres-Horse-Ranch",
      "Horse-Shoe-Farms",
      'Blueberry-Orchard',
      'Moose',
      'Cattle-Feed',
      'Cattle-Feed-Curved'
    );
  };


  ?>
    <div id="lightbox-background" class="lightbox-background">
      <div id="lightbox-button-close" class="lightbox-button-close"><p>X</p></div>
      <div class="masonry">
        <?php for ($i = 0; $i < count($patternArray); $i++) {
          $pat = $patternArray[$i];
        ?>
        <img id='<?php echo $pat ?>' class="lightbox-pattern-img" data-value="<?php echo $pat ?>" src="<?php echo $imageDir?><?php echo $pat ?>.jpg">
        <?php } ?>
      </div>
    </div>
  <div class="pattern-select-wrapper">
    <label for="pattern-select-box">Pattern Type</label>
    <select id="pattern-select-box" name="pattern-select-box" class="pattern-select-box">
      <?php for ($i = 0; $i < count($patternArray); $i++) {
        $pat = $patternArray[$i];
        $displayName = str_replace('-', ' ', $pat);
      ?>
      <option value="<?php echo $pat ?>"><?php echo $displayName ?></option>
      <?php } ?>
    </select>
    <img id="pattern-preview-image" class="pattern-preview-image" src="<?php echo $imageDir; ?><?php echo $patternArray[0] ?>.jpg">
   </div>
   <?php
}
add_action('ddd_add_pattern_selection_input', 'add_pattern_selection_input', 10);

// Change product price -------------------------------------------------------------------------------------------//
// add_action( 'woocommerce_before_calculate_totals', 'add_custom_item_price', 10 );
// function add_custom_item_price( $cart_object ) {
//
//     foreach ( $cart_object->get_cart() as $item_values ) {
//
//         ##  Get cart item data
//         $item_id = $item_values['data']->id; // Product ID
//         $original_price = $item_values['data']->price; // Product original price
//
//         ## Get your custom fields values
//         $mounting_style = $item_values['custom_data']['mounting_style'];
//         // console_log($mounting_style);
//         // CALCULATION FOR EACH ITEM:
//         ## Make HERE your own calculation to feet your needs  <==  <==  <==  <==
//         $new_price = $original_price + 25;
//
//         ## Set the new item price in cart
//         $item_values['data']->price = $new_price;
//         console_log($item_values['data']->price);
//     }
// }

?>
