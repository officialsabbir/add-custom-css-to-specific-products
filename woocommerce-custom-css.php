function enqueue_custom_css_for_selected_products() {
    if (is_product() || is_cart() || is_checkout()) {
        global $post;

        // Array of selected product IDs
        $selected_product_ids = array(12629, 12633, 12634, 12635, 12639, 12640, 12641, 12645, 12646);

        // Check if the current product is in the selected product IDs
        if (in_array($post->ID, $selected_product_ids)) {
            // Enqueue the custom CSS
            wp_add_inline_style('woocommerce-inline', '
              // write custom css here
            ');
        }

        // Additional condition for cart and checkout pages
        if (is_cart() || is_checkout()) {
            $cart = WC()->cart->get_cart();
            foreach ($cart as $cart_item) {
                if (in_array($cart_item['product_id'], $selected_product_ids)) {
                    wp_add_inline_style('woocommerce-inline', '
                          // write custom css here
                    ');
                    break;
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_css_for_selected_products');
