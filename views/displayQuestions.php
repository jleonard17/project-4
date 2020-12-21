<?php include('header.php'); ?>

    <a href=".?action=display_question_form&userId=<?php echo $userId ?>">Add Questions</a>
    <a href=".?action=display_questions&userId=<?php echo $userId ?>&listType=mine">Show My Questions</a>
    <a href=".?action=display_questions&userId=<?php echo $userId ?>&listType=all">Show All Questions</a>

    <h2>Questions for User with ID: <?php echo $userId; ?></h2>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Body</th>
            <th>Skills</th>
        </tr>
        <?php foreach ($questions as $question) : ?>
            <tr>
                <td><?php echo $question['title']; ?></td>
                <td><?php echo $question['body']; ?></td>
                <td><?php echo $question['skills']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id'] ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId ?>">

                        <input type="submit" value="Delete" class="btn btn-secondary">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href=".?action=logout">Logout</a>


<?php include('footer.php'); ?>