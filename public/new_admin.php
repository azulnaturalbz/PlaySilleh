<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 18/03/2017
 * Time: 21:14 PM
 */

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $username = mysql_prep($_POST["username"]);
        $hashed_password = password_encrypt($_POST["password"]);

        $query  = "INSERT INTO admins (";
        $query .= "  username, hashed_password";
        $query .= ") VALUES (";
        $query .= "  '{$username}', '{$hashed_password}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["message"] = "Admin created.";
            redirect_to("manage_admins.php");
        } else {
            // Failure
            $_SESSION["message"] = "Admin creation failed.";
        }
    }
} else {
    // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
    <nav>
        &nbsp;
    </nav>
    <main>
        <section>
            <div class="col-md-offset-4 col-md-3">
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>

            <h2>Create Admin</h2>
            <form action="new_admin.php" method="post">
                <p>Username:
                    <input type="text" name="username" value="" />
                </p>
                <p>Password:
                    <input type="password" name="password" value="" />
                </p>
                <input class="btn btn-info" role="button" type="submit" name="submit" value="Create Admin" />
            </form>
            <br />
            <a class="btn btn-info" role="button" href="manage_admins.php">Cancel</a>
            </div>
        </section>

        <header></header>
        <article>

        </article>
        <footer></footer>
        <header></header>
        <article>

        </article>
        <footer></footer>
    </main>
    <aside>

    </aside>

<?php include("../includes/layouts/footer.php"); ?>