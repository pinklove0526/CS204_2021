<?php include 'includes/header.php';
include 'classes/Task.php';

if (isset($_POST['new-task']))
{
    $task_text = $_POST['task'];
    $task = new Task($conn);
    $task->createTask($task_text);
}
if (isset($_POST['delete']))
{
    $task_id = $_POST['task-id'];
    $task = new Task($conn);
    $task->deleteTask($task_id);
}
if ($_SESSION['loggedin'])
{
    $tasks = new Task($conn);
    $tasks->getTasks($_SESSION['user_id']);
}
?>

        <div class="container">
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success mt-3" role="alert">Task added successfully!</div>
            <?php elseif (isset($_GET['login'])): ?>
                <div class="alert alert-success mt-3" role="alert">You have logged in!</div>
            <?php elseif (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3" role="alert">There was a problem adding / deleting your task...</div>
            <?php elseif (isset($_GET['delete'])): ?>
                <div class="alert alert-warning mt-3" role="alert">Task was deleted...</div>
            <?php endif; ?>
            <?php if (!$_SESSION['loggedin']): ?>
                <div class="row">
                    <div class="col-md-6 offset-md-3 mt-5 mb-5">
                        <div class="card">
                            <div class="card-header">Please login!</div>
                            <div class="card-body">
                                <h5 class="card-title">You must login to add a task!</h5>
                                <a href="login.php" class="btn btn-primary btn-block"><ion-icon name="person-circle-outline"></ion-icon> Login / create account</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 mt-3 mb-3">
                        <div class="card">
                            <div class="card-header"><h3>Add a new task</h3></div>
                            <div class="card-body">
                                <form class="" action="index.php" method="POST">
                                    <input type="text" name="task" class="form-control mt-4 mb-4" placeholder="Input new task here...">
                                    <button type="submit" new="new-task" class="btn btn-outline-primary btn-block"><ion-icon name="add-outline"></ion-icon> Add new task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (empty($tasks->tasks)): ?>
                        <h1 class="display-4">No tasks found for this user...</h1>
                    <?php else: ?>
                        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg 3">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Task</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tasks->tasks as $task): ?>
                                        <tr>
                                            <td>
                                                <?php if ($task['task_status'] == 1): ?>
                                                    class="finished"
                                                <?php endif; ?>
                                                <?php echo htmlspecialchars($task['task_text']); ?>
                                            </td>
                                            <td><button type="button" name="button" class="btn btn-outline-success btn-sm completed" data-task-id="<?php echo $task['ID']; ?>">Done</button></td>
                                            <td>
                                                <form class="" action="index.php" method="POST">
                                                    <input type="hidden" name="task-id" value="<?php echo $task['ID']; ?>">
                                                    <button type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

<?php include 'includes/footer.php'; ?>