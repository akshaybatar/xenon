<?php
extend('include/header.php');
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 pt-4">
            <h2>Register form</h2>
            <form action="register-submit" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="login" class="btn btn-dark">Login</a>
            </form>
        </div>
    </div>
</div>
<?php
extend('include/footer.php');
?>