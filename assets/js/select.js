jQuery(function ($) {
    $(document).ready(function () {

        function fieldSelect() {
            var allSelected = document.querySelectorAll(".selected");


            allSelected.forEach(function (selected) {
                const fieldSelect = selected.parentElement;
                const selectOptions = selected.nextElementSibling;
                const optionsList = selectOptions.querySelectorAll(".option");
                let isClicked = true;


                optionsList.forEach(function (option) {
                    option.addEventListener("click", function (event) {
                        selected.getElementsByTagName("span")[0].innerText = this.querySelector("label").innerText
                        const optionContainer = event.target.parentElement;
                        for (const child of optionContainer.children) {
                            child.classList.remove("option-focused");
                        }
                        this.classList.add("option-focused")
                        fieldSelect.classList.remove("select-active")
                        event.stopPropagation();
                    });
                });

                window.addEventListener('mouseup', function (e) {
                    e.preventDefault()
                    if (selectOptions !== e.target) {
                        fieldSelect.classList.remove("select-active")
                        isClicked = true;
                    }
                    e.stopPropagation();
                })

                selected.addEventListener("click", function (event) {
                    event.preventDefault();
                    if (isClicked) {
                        this.parentElement.classList.add("select-active");
                        isClicked = false;
                    } else {
                        this.parentElement.classList.remove("select-active");
                        isClicked = true;
                    }
                    event.stopPropagation();
                })
            })
        }

        fieldSelect();

    });
});