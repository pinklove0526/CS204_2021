<?php include 'includes/header.php';
$errors = [];
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $position = $_POST['position'];
    $moons = $_POST['moons'];
    $imgurl = $_POST['imgurl'];
    if (isset($_POST['type']))
        $type = $_POST['type'];
    else
        $errors['type'] = "Planet type must be terrestrial or gaseous!";
    $planets = ['mercury', 'venus', 'earth', 'mars', 'jupiter', 'saturn', 'uranus', 'neptune'];
    if (!in_array(strtolower($name), $planets))
        $errors['name'] = "'" . htmlspecialchars($name) . "'" . " isn't a known planet!";
    if ($position < 1 || $position > 8)
        $errors['position'] = "Planet position must be between 1 - 8!";
    if ($moons < 0)
        $errors['moons'] = "Number of moons cannot be a negative number!";
    if ($type != "terrestrial" && $type != "gaseous")
        $errors['type'] = "Planet type must be terrestrial or gaseous!";
    if (!filter_var($imgurl, FILTER_VALIDATE_URL))
        $errors['imgurl'] = "Image URL is invalid!";
    if (empty($errors))
    {
        $sql = "select * from planets where name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows == 0)
        {
            $sql = "insert into planets (name, moons, position, type, imgurl) values (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("siiss", $name, $moons, $position, $type, $imgurl);
            $stmt->execute();
            if ($stmt->affected_rows == 1)
            {
                $location = "Location: planet.php?id=" . $stmt->insert_id . "&new=true";
                header($location);
            }
        }
        else
            $errors['exists'] = "This planet is already in the database!";
    }
}
?>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <h1 class="display-4 text-center mt-3 mb-2"><ion-icon name="globe-outline"></ion-icon> Add a planet</h1>
                    <form class="" action="create.php" method="POST">
                        <label for="name"><ion-icon name="globe-outline"></ion-icon> Planet name</label>
                        <input type="text" name="name" value="" class="form-control" placeholder="Earth, Mars, Jupiter, etc.">
                        <label for="position"><ion-icon name="filter-outline"></ion-icon> Position from the Sun</label>
                        <input type="number" name="position" value="" class="form-control" placeholder="Earth = 3 ...">
                        <label for="moons"><ion-icon name="moon-outline"></ion-icon> Moons</label>
                        <input type="number" name="moons" value="" class="form-control" placeholder="i.e. Earth = 1 ...">
                        <label for="type"><ion-icon name="planet-outline"></ion-icon> Planet type</label><br>
                        <input type="radio" name="type" value="terrestrial" checked> Terrestrial<br>
                        <input type="radio" name="type" value="gaseous"> Gaseous <br>
                        <label for="imgurl"><ion-icon name="images-outline"></ion-icon> Link to planet image</label>
                        <input type="text" name="imgurl" value="" class="form-control" placeholder="URL link to the planet image...">
                        <button type="submit" name="submit" class="btn btn-block btn-lg btn-dark mt-3 mb-3"><ion-icon name="add-outline"></ion-icon> Add planet</button>
                    </form>
                </div>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>