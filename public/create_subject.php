<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 15/03/2017
 * Time: 04:19 AM
 */
if(isset($_POST['submit'])){
    // Often these are form values in $_POST
    $menu_name = mysql_prep ( $_POST["menu_name"]);
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];

    $required_field = array("menu_name","position","visible");

    validate_presences($required_field);

    $fields_with_max_lenghts = array("menu_name" => 30);
    validate_max_lengths($fields_with_max_lenghts);

    if(!empty($errors)){
        $_SESSION["errors"] = $errors;
        redirect_to("new_subject.php");
    }
    // 2. Perform database query
    $query  = "INSERT INTO subjects (";
    $query .= "  menu_name, position, visible";
    $query .= ") VALUES (";
    $query .= "  '{$menu_name}', {$position}, {$visible}";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
       $_SESSION ["message"] = "Subject Created." ;
        // redirect_to("somepage.php");
        redirect_to("manage_content.php");
    } else {
        // Failure
        // $message = "Subject creation failed";
        $_SESSION ["message"]  = "Subject Creation failed.";
        //die("Database query failed. " . mysqli_error($connection));
        redirect_to("new_subject.php");
    }

}else{

    redirect_to("new_subject.php");

}
if(isset($connection)){
    mysqli_close($connection);
}
?>