console.log("form.js loaded");

let commentform = document.querySelector("form");

commentform.addEventListener("submit", function(e)
{
    e.preventDefault();
    let commentinput = commentform.querySelector("textarea");
    commentAjax(commentinput.value);
});

function commentAjax(comment)
{
    let xhr = new XMLHttpRequest();
    console.log(comment);
    xhr.open("POST", "comment-ajax.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function()
    {
        if (this.status == 200)
            console.log(this.responseText);
    }
    xhr.send("comment=" + comment);
}