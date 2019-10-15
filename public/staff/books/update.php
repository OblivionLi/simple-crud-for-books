<?php include_once('../../../private/initialize.php'); ?>

<?php

if (!isset($_GET['id'])) {
    redirect_to(url_for('/index.php'));
}

$id = $_GET['id'];
$book = Book::find_by_id($id);

if ($book == false) {
    redirect_to('/index.php');
}

if (is_post_request()) {
    $args = $_POST['book'];
    $book->merge_attributes($args);
    $result = $book->save();

    if ($result === true) {
        //$new_id = $book->id; -> used for redirecting directly to the show record page only
        $session->message('The book ' . '\'' .h($book->title) . '\'' . ' was updated successfully.');
        redirect_to(url_for('/staff/books/show.php?id=' . $id));
    } else {
        // show errors
    }

} else {
    // display the form
}
?>

<?php require_once(SHARED_PATH . '/header.php'); ?>

    <div class="header shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Update this book: <?php echo h($book->title); ?></h1>
    </div>

    <div class="main shadow-sm p-3 mb-5 bg-white rounded">
        <div class="action text-center">
            <a href="<?php echo url_for('/index.php'); ?>">Go Back</a>
        </div>

        <div class="content shadow-lg p-3 mb-5 bg-white rounded">

            <?php echo display_errors($book->errors); ?>

            <form action="<?php echo url_for('/staff/books/update.php?id=' . h(u($book->id))); ?>" method="post">

                <?php include('form_fields.php'); ?>

                <div class="form-group button">
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>