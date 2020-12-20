<?php include('header.php'); ?>

    <a href=".?action=display_question_form&userId=<?php echo $userId ?>">Add Questions </a>
    <a href=".?action=display_questions&userId=<?php echo $userId ?>&listType=mine">Show My Questions </a>
    <a href=".?action=display_questions&userId=<?php echo $userId ?>&listType=all">Show All Questions </a>

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
            </tr>
        <?php endforeach; ?>
    </table>

<?php include('footer.php'); ?>