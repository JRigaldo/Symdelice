jQuery(function ($) {
    $(document).ready(function () {
        $('input[type="checkbox"].field-check').click(function (e) {
            var classes = this.classList;
            for (var i = 0, len = classes.length; i < len; i++) {
                if ($(this).hasClass(classes[i]) && $(this)[0].checked === true) {
                    console.log('test')
                    var fieldInfos = $(this).parent().parent().next().children();
                    fieldInfos.each(function () {
                        console.log($(this))
                        if ($(this).hasClass('field-info-no')) {

                            $(this).removeClass('field-info-active');
                        }
                        if ($(this).hasClass('field-info-yes')) {
                            $(this).addClass('field-info-active');
                        }
                    });
                } else {
                    var fieldInfos = $(this).parent().parent().next().children();
                    fieldInfos.each(function () {
                        if ($(this).hasClass('field-info-yes')) {
                            $(this).removeClass('field-info-active');
                        }
                        if ($(this).hasClass('field-info-no')) {
                            $(this).addClass('field-info-active');
                        }
                    });
                }
            }
        });
    });
});