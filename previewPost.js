document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("postForm");
    let titleInput = document.querySelector('input[name="title"]');
    let contentInput = document.querySelector('textarea[name="content"]');

    // Check if there is data in local storage
    let storedTitle = localStorage.getItem('previewedTitle');
    let storedContent = localStorage.getItem('previewedContent');

    // If there is data in local storage, insert them back into the form input fields
    if (storedTitle) {
        titleInput.value = storedTitle;
    }
    if (storedContent) {
        contentInput.value = storedContent;
    }

    form.onsubmit = function(event) {
        // Prevent the form from being submitted normally
        event.preventDefault();

        // Store form data in localStorage
        localStorage.setItem('previewedTitle', titleInput.value);
        localStorage.setItem('previewedContent', contentInput.value);

        form.submit();
    };
});
