<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 18/03/2017
 * Time: 21:14 PM
 */

$admin_set = find_all_admins();
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<main>
    <nav>
        <div class="col-xs-3">
        <br/>
        <a class="btn btn-info" role="button" href="admin.php">Main Menu</a>
        <br/>
        </div>
    </nav>
    <section>
        <?php echo message(); ?>
        <h2>Manage Admins</h2>
        <table>
            <tr>
                <th style="text-align: left; width: 200px;">Username</th>
                <th colspan="2" style="text-align: left;">Actions</th>
            </tr>
            <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                <tr>
                    <td><?php echo htmlentities($admin["username"]); ?></td>
                    <td><a class="btn btn-info" role="button" href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
                    <td><a class="btn btn-info" role="button" href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                </tr>
            <?php } ?>
                <tr>
                    <td><a class="btn btn-info" role="button" href="new_admin.php">Add new admin</a> </td>
                </tr>
        </table>



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
<?php include("../includes/layouts/footer.php"); ?>
