<?php

function tawards_enqueue_scripts() {
    wp_enqueue_script( 'tawards-script', get_stylesheet_directory_uri() . '/assets/js/script.js', [ 'jquery' ], time(), true );
}
add_action('wp_enqueue_scripts', 'tawards_enqueue_scripts');

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
                            <a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo wp_kses_post( $product_tab['title'] ); ?></a>
                        </div>
                
                    <?php endforeach; ?>
                </div>
                <div class="tab-content-container">
                        <?php 
                        $count = 0;
                        foreach( $product_tabs as $key => $product_tab ) : 
                            $count++;?>
                            <div class="tab-content <?php 
                                if ( $count === 1 ) { echo 'tab-active'; } 
                                ?>" id="tab-<?php echo esc_attr( $key ); ?>">
                                <?php 
                                    if ( isset( $product_tab['callback'] ) ) {
                                        call_user_func( $product_tab['callback'], $key, $product_tab );
                                    }
                                ?>
                            </div>
                            
                        <?php endforeach; ?>
                </div>
            </div>

            <?php endif; 
    }

    add_action('woocommerce_after_single_product_summary', 'tawards_data_tabs', 10);

// }