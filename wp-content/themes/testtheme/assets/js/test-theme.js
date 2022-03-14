( function( $) {
    $(document).ready(function() {
        var responsiveHeader = {
            onResize: function () {
                $(window).resize(function () {
                    responsiveHeader.checkWidth();
                });
            },
            checkWidth: function () {
                if (window.innerWidth >= 768) {
                    responsiveHeader.desktop();
                } else {
                    responsiveHeader.mobile();
                }
            },
            desktop: function () {
                $('#website_main_navigation').appendTo('.page-header .nav-outer');
            },
            mobile: function () {
                $('#website_main_navigation').appendTo('#mobile_sidebar');
            },
            init: function () {
                this.onResize();
                this.checkWidth();
            }
        };

        responsiveHeader.init();

        $('#mobile_menu_icon').click(function() {
            $('body').toggleClass('mobile-sidebar-visible');
        });
    });

    $('.faq-item .question').click(function() {
        $(this).siblings('.answer').stop().slideToggle(300);
    });
}
( jQuery ) );