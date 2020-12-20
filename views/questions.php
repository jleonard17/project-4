<?php include('header.php'); ?>


    <h1 class="text-center title">New Question Form</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="submit_question">
        <input type="hidden" name="userId" value="<?php echo $userId ?>">

        <div class="form-group">
            <label for="title">Question Name</label>
            <input id="title" type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Question Body</label>
            <input id="body" type="text" name="body" class="form-control">
        </div>

        <div class="form-group">
            <label for="skills">Questions Skills </label>
            <input id="skills" type="text" name="skills" class="form-control">
        </div>

        <input type="submit" value="Add Question" class="btn btn-primary">
    </form>

<?php include('footer.php'); ?>
