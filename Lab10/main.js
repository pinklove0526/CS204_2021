let tasktable = document.querySelector("table");

tasktable.addEventListener("click", function(e)
{
    console.log(e.target);
    if (e.target.classList.contains("completed"))
        taskCompleted(e.target);
});

function taskCompleted(el)
{
    let task_id = el.getAttribute("data-task-id");
    console.log(task_id);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxmanager.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function()
    {
        if (this.status == 200)
        {
            console.log(this.responseText);
            if (this.responseText == "success")
            {
                el.closest("tr").firstElementChild.classList.add("finished");
                el.classList = "btn btn-sm btn-outline-default undo";
                el.textContent = "undo";
            }
        }
    }
    xhr.send("task_completed=true&task_id=" + task_id);
}