console.log("main.js loaded");
let theform = document.querySelector("form.comment-form");
let thecomment = document.querySelector(".comment-form textarea");
let hiddeninput = document.querySelector(".comment-form input");
let commentsdiv = document.querySelector(".comments");
let commentcard = document.querySelectorAll(".card");
theform.addEventListener("submit", function(event)
{
    event.preventDefault();
    commentAjax(thecomment.value, hiddeninput.value);
    theform.reset();
});
commentcard.forEach((card, i) =>
{
    card.addEventListener("click", function(e)
    {
        e.preventDefault();
        console.log("Click");
        if (e.target.classList.contains("delete-post"))
        {
            console.log("Delete");
            let par = e.target.parentNode.parentNode.parentNode;
            console.log("Par");
            par.classList.add("shrinkStart");
            setTimeout(function()
            {
                par.classList.add("shrinkFinish");
            }, 100);
        }
        console.log(e);
    });
});
function commentAjax(comment, postid)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/commentmanager", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function()
    {
        if (this.status == 200)
        {
            console.log(this.responseText);
            let output = JSON.parse(this.responseText);
            console.log(output);
            outputNewComment(output);
        }
    }
    xhr.send("comment=" + comment + "&" + postid);
}
function outputNewComment(output)
{
    let newdiv = document.createElement("div");
    newdiv.classList = "col-md-7 mt-2 mb-2";
    commentsdiv.prepend(newdiv);
    let theoutput = `<div class="card">
    <div class="card-header">${output.user_name} | ${output.date_created}</div>
    <div class="card-body"><p class="card-text">${output.comment_text}</p></div></div>`;
    newdiv.innerHTML = theoutput;
}