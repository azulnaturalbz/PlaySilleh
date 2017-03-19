<?php include("../includes/session.php");?>
<?php include("../includes/db_connection.php");?>
<?php include("../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php");?>
<?php find_selected_page(); ?>


<nav>
<div class="col-xs-3">
        <?php echo navigation($current_subject,$current_page); ?>
 </div>
</nav>

<main>

        <section>
            <?php echo message(); ?>
            <?php $errors = errors();?>
            <?php echo form_errors($errors);?>
            <h2>Create Subject</h2>
                <form action="create_subject.php" method="post">
                    <p>Menu Name:
                        <input type="text" name="menu_name" value="" />
                    </p>
                    <p>Postion:
                        <select name="position">
                            <?php
                            $subject_set = find_all_subjects($subject_set);
                            $subject_count= mysqli_num_rows($subject_set );
                            for($count=1;$count <= ($subject_count + 1);$count++){
                                echo "<option value=\"{$count}\">{$count}</option>";

                            }

                            ?>

                        </select>
                    </p>
                    <p>Visible:
                        <input type="radio" name="visible" value="0"/> No
                        &nbsp;
                        <input type="radio" name="visible" value="1"/> Yes
                    </p>
                    <input class="btn btn-info" role="button" type="submit" name="submit" value="Create Subject" />
                </form>
            <br />
            <a class="btn btn-info" role="button" href="manage_content.php">Cancel</a>
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
