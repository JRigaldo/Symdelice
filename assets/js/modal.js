jQuery(function ($) {
    $(document).ready(function () {
        function modalAlert() {
           $('.action-close').click(function(e){
               e.preventDefault();
               $(this).parent().hide();
           });
        }
        modalAlert()
    })
})
