/* jquery validation for alphabets */
$.validator.addMethod(
    "alpha",
    function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    },
    "Enter a valid data."
);
