<?php
extend('include/header.php');
?>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-sm-6 pt-4">
            <h2>Dashboard</h2>
            <h3> <?php echo $_SESSION['name']  ?></h3>

            <a href="logout" class="btn btn-primary">Logout</a>

        </div>
    </div>

</div>
<?php
extend('include/footer.php');
?>