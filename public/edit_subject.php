<?php include("../includes/session.php");?>
<?php include("../includes/db_connection.php");?>
<?php include("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php find_selected_page(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 15/03/2017
 * Time: 04:19 AM
 */
if(isset($_POST['submit'])){
    // Often these are form values in $_POST

    $required_field = array("menu_name","position","visible");

    validate_presences($required_field);

    $fields_with_max_lenghts = array("menu_name" => 30);
    validate_max_lengths($fields_with_max_lenghts);

    if(empty($errors)){


        $id = $current_subject["id"];
        $menu_name = mysql_prep ( $_POST["menu_name"]);
        $position = (int) $_POST["position"];
        $visible = (int) $_POST["visible"];

        // 2. Perform database query
        $query  = "UPDATE subjects SET ";
        $query .= "menu_name = '{$menu_name}', ";
        $query.=  "position = {$position}, ";
        $query .= "visible = {$visible} ";
        $query .= "WHERE id ={$id} ";
        $query .= "LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection)>=0) {
            // Success
            $_SESSION ["message"] = "Subject Updated." ;
            // redirect_to("somepage.php");
            redirect_to("manage_content.php");
        } else {
            // Failure
            // $message = "Subject creation failed";
            $message = "Subject Update failed.";
            //die("Database query failed. " . mysqli_error($connection));

        }
    }
}else{



}

?>

<?php if(!$current_subject){
    redirect_to("manage_content.php");
}
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php");?>

<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 15/03/2017
 * Time: 06:14 AM
 */ ?>

<nav>
    <div class="col-xs-3">
        <?php echo navigation($current_subject,$current_page); ?>
    </div>
</nav>

<main>

    <section>

        <?php if(!empty($message)){
           echo "<div>".htmlentities($message)."</div>";
        }?>

        <?php echo form_errors($errors);?>
        <h2>Edit Subject: <?php echo htmlentities($current_subject["menu_name"]); ?></h2>
        <form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
            <?php echo $current_subject["menu_name"]; ?>
            <p>Menu Name:
                <input type="text" name="menu_name" value="<?php echo htmlentities($current_subject["menu_name"]); ?>" />
            </p>
            <p>Postion:
                <select name="position">
                    <?php
                    $subject_set = find_all_subjects(false);
                    $subject_count= mysqli_num_rows($subject_set );
                    for($count=1;$count <= $subject_count;$count++){
                        echo "<option value=\"{$count}\"";
                        if($current_subject["position"]== $count){
                            echo " selected";
                        }
                        echo ">{$count}</option>";

                    }

                    ?>

                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="0"
                <?php if($current_subject["visible"]== 0){echo "checked";} ?>/> No
                &nbsp;
                <input type="radio" name="visible" value="1"
                <?php if($current_subject["visible"]== 1){echo "checked";} ?>/> Yes
            </p>
            <input class="btn btn-info" role="button" type="submit" name="submit" value="Edit Subject" />
        </form>
        <br />
        <a class="btn btn-info" role="button" href="manage_content.php">Cancel</a>
        <a  class="btn btn-info" role="button" href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]);?>" onclick="return confirm('Are you sure?');">Delete</a>
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
