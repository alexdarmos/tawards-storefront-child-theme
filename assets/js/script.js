(function($) {
    
    /** Add display functionality to product page tabs */
    (function() {
        if ( $('.tawards-tabs-container').length ) {

            $('.tab-title a').on('click', (e) => {
                e.preventDefault();
                
                let target = $(e.target).attr("href");

                if ( $(target).hasClass('tab-active') ) {
                    return;
                } else {
                    $('.tab-content.tab-active').removeClass('tab-active');

                    $(target).addClass('tab-active');
                }
            })

        }
    })()

})(jQuery);