function clear(e){
    e.preventDefault();
    var title = document.getElementById("title");
    var content = document.getElementById("content");

    title.classList.remove("empty");
    content.classList.remove("empty");

    if (confirm("Are you sure you want to clear the form?")) {
        title.value = "";
        content.value = "";
    }
}

if (document.getElementById("clear")) {
    document.getElementById("clear").addEventListener("click", clear);
}

function validateForm(e){
    var title = document.getElementById("title");
    var content = document.getElementById("content");

    // Remove the 'empty' class if it was previously added
    title.classList.remove("empty");
    content.classList.remove("empty");

    if (title.value.trim() === "" || content.value.trim() === "") {
        // Add the 'empty' class to highlight the fields
        if (title.value.trim() === "") {
            title.classList.add("empty");
        }
        if (content.value.trim() === "") {
            content.classList.add("empty");
        }
        e.preventDefault(); 
    }
}

if (document.getElementById("post")) {
    document.getElementById("post").addEventListener("click", validateForm);
}
