
<?php include('header.php'); ?>

    <h1 class="text-center title">Registration Form</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="validate_registration">

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" class="form-control">
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" class="form-control">
        </div>

        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input id="birthday" name="birthday" type="date" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control">
        </div>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>

<?php include('footer.php'); ?>
