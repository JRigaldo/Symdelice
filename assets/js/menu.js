jQuery(function ($) {
    $(document).ready(function () {
        function responsive() {
            $("#header-icon-links").click(function (e) {
                e.preventDefault()
                $("body").addClass("with-sidebar-links")
                $("html").css('overflow-y', 'hidden');
            })
            $("#exit-menu-links").click(function (e) {
                e.preventDefault()
                $("body").removeClass("with-sidebar-links")
                $("html").css('overflow-y', 'scroll');
            })
            $("#site-cover").click(function (e) {
                e.preventDefault()
                $("body").removeClass("with-sidebar-links")
                $("html").css('overflow-y', 'scroll');
            })
        }
        responsive()
    })
})
