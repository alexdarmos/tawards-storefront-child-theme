<?php



//todo: use posts_selection action to fix is_product() condition
// if ( is_product() ) {
    remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);

    function tawards_data_tabs() {
        $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

        if ( ! empty( $product_tabs ) ) : ?>

            <div class="tawards-tabs-container">
                <div class="tawards-tab-title-container">
                    <?php foreach( $product_tabs as $key => $product_tab ) : ?>
                        <div class="tab-title">
                            <a><?php echo wp_kses_post( $product_tab['title'] ); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php endif; 
    }

    add_action('woocommerce_after_single_product_summary', 'tawards_data_tabs', 10);

// }