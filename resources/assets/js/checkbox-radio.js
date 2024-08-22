
// Select all checkboxes with the name 'settings' using querySelectorAll.
let checkboxes = document.querySelectorAll("input[type=checkbox][name=rules]");


checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        this.value = this.checked ? 1 : 0;
    })
});
