<?php include("../includes/session.php");?>
<?php include("../includes/db_connection.php");?>
<?php include("../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php");?>




<nav>
    <div class="col-xs-3">

        <ul class="nav nav-pills nav-stacked">
            <li ><a class="btn btn-info" role="button" href="manage_content.php">Manage Website Content</a> </li>
            <li><a class="btn btn-info" role="button" href="manage_admins.php">Manage Admin Users</a> </li>
            <li><a class="btn btn-info" role="button" href="logout.php">Logout</a> </li>


        </ul>

    </div>
</nav>


<main>

    <section>
        <h2>Admin menu</h2>
        <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?></p>
        <header></header>
        <article>

        </article>
        <footer></footer>
        <header></header>
        <article>

        </article>
        <footer></footer>

    </section>

</main>
<aside>


</aside>
<?php include("../includes/layouts/footer.php");?>