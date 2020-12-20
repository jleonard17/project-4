
<?php include('header.php'); ?>

<h1 class="text-center"> Login </h1>
<form action="../index.php" method="post">
    <input type="hidden" name="action" value="validate_login">

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include('footer.php'); ?>