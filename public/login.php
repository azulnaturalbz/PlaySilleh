<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 18/03/2017
 * Time: 21:14 PM
 */
$username = "";
if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);



    if (empty($errors)) {
        // Perform Create
        $username = $_POST["username"];
        $password = $_POST["password"];

        $found_admin = attempt_login($username,$password);

        if ($found_admin) {
            // Success
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["username"];
            redirect_to("admin.php");
        } else {
            // Failure
            $_SESSION["message"] = " Username / password not found";
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
    <main >
       <!-- <section>
            <?php /*echo message(); */?>
            <?php /*echo form_errors($errors); */?>

            <h2>Login</h2>
            <form action="login.php" method="post">
                <p>Username:
                    <input type="text" name="username" value="<?php /*echo htmlentities($username);*/?>" />
                </p>
                <p>Password:
                    <input type="password" name="password" value="" />
                </p>
                <input class="btn btn-info" role="button" type="submit" name="submit" value="Submit" />
            </form>

        </section>-->
        <section>
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <form action="login.php" method="post">
               <div class="container">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-3">
                            <h2>Login</h2>
                            <div class="form-login">
                                <h4>Welcome back.</h4>
                                <input type="text" name="username" id="username" class="form-control input-sm chat-input" placeholder="username"  value="<?php echo htmlentities($username);?>"/>
                                </br>
                                <input type="password"  name="password" id="password" class="form-control input-sm chat-input" placeholder="password" value="" />
                                </br>
                                <div class="wrapper">
            <span class="group-btn">
                <input class="btn btn-primary btn-md"  role="button" type="submit" name="submit" value="Login" /><i class="fa fa-sign-in"></i>
            </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>



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