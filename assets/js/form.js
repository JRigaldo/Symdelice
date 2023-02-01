jQuery(function ($) {
    $(document).ready(function () {
        function materialDesign() {
            // For personnal form
            var fieldInpout = $(".field-input")
            fieldInpout.focus(function () {
                $(this).parent().addClass("is-focused has-label")
            })
            fieldInpout.each(function () {
                if ($(this).val() !== "") {
                    $(this).parent().addClass("has-label")
                }
            })
            fieldInpout.blur(function () {
                if ($(this).val() === "") {
                    $(this).parent().removeClass("has-label")
                }
                $(this).parent().removeClass("is-focused")
            })
            $(".field-textarea").focus(function () {
                $(this).parent().addClass("is-focused has-label")
            })
            $(".field-textarea").blur(function () {
                if ($(this).val() === "") {
                    $(this).parent().removeClass("has-label")
                }
                $(this).parent().removeClass("is-focused")
            })
            var fieldInlineInput = $(".field-inline-input")
            fieldInlineInput.focus(function () {
                $(this).parent().addClass("is-focused has-label")
            })
            fieldInlineInput.each(function () {
                if ($(this).val() !== "") {
                    $(this).parent().addClass("has-label")
                }
            })
            fieldInlineInput.blur(function () {
                if ($(this).val() === "") {
                    $(this).parent().removeClass("has-label")
                }
                $(this).parent().removeClass("is-focused")
            })
        }
        materialDesign()
    });
});