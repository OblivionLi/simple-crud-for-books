<?php include_once('../../../private/initialize.php'); ?>

<?php
if (is_post_request()) {
    $args = $_POST['book'];
    $book = new Book($args);
    $result = $book->save();

    if ($result === true) {
        $new_id = $book->id;
        $session->message('The book was created successfully.');
        redirect_to(url_for('/staff/books/show.php?id=' . $new_id));
    } else {
        // show errors
    }

} else {
    $book = new Book();
}
?>

<?php require_once(SHARED_PATH . '/header.php'); ?>

    <div class="header shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Add a new Book</h1>
    </div>

    <div class="main shadow-sm p-3 mb-5 bg-white rounded">
        <div class="action text-center">
            <a href="<?php echo url_for('/index.php'); ?>">Go Back</a>
        </div>

        <div class="content shadow-lg p-3 mb-5 bg-white rounded">

            <?php echo display_errors($book->errors); ?>

            <form action="<?php echo url_for('/staff/books/create.php') ?>" method="post">

                <?php include('form_fields.php'); ?>

                <div class="form-group button">
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>
