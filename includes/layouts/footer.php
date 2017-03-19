<style>
    #footer{
        position:fixed;
        bottom:0;
        left:0;
    }
</style>
<footer id="footer"> Copyright <?php echo date("Y"); ?> , PlaySilleh</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
// 5. Close database connection
if(isset($connection)){
    mysqli_close($connection);
}

?>
