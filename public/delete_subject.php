<?php include("../includes/session.php");?>
<?php include("../includes/db_connection.php");?>
<?php include("../includes/functions.php");?>
<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 16/03/2017
 * Time: 05:09 AM
 */
 find_selected_page(); ?>
<?php
    $current_subject = find_subject_by_id($_GET["subject"],false);
    if(!$current_subject){
    redirect_to("manage_content.php");
    }
    $pages_set = find_pages_for_subject($current_subject["id"]);
    if(mysqli_num_rows($pages_set)>0){
        $_SESSION["message"] = "Can't Delete a subject with pages.";
        redirect_to("manage_content.php?subject={$current_subject["id"]}");
    }


    $id = $current_subject["id"];
    $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection)==1) {
        // Success
        $_SESSION ["message"] = "Subject Deleted." ;
        // redirect_to("somepage.php");
        redirect_to("manage_content.php");
    } else {
        // Failure
        // $message = "Subject creation failed";
        $message = "Subject Delete failed.";
        redirect_to("manage_content.php?subject={$id}");

        //die("Database query failed. " . mysqli_error($connection));

    }
?>
