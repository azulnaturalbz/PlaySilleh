<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php");?>
<?php find_selected_page(true); ?>
<nav>
    <div class="col-xs-3">

        <?php echo public_navigation($current_subject,$current_page); ?>
        <br/>

    </div>

</nav>
<main>

    <section>


        <?php if($current_page) {?>
            <h2><?php echo htmlentities($current_page["menu_name"]); ?></h2>

            <?php echo nl2br(htmlentities($current_page["content"])); ?>


        <?php }else{ ?>
            <?php echo "Welcome"?>
        <?php } ?>

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
