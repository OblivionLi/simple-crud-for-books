<?php include_once('../../../private/initialize.php'); ?>

<?php

if (!isset($_GET['id'])) {
    redirect_to(url_for('/index.php'));
}

$id = $_GET['id'];
$book = Book::find_by_id($id);

if ($book == false) {
    redirect_to(url_for('/index.php'));
}

if (is_post_request()) {
    $result = $book->delete();
    $session->message('The book ' . h($book->title) . ' was deleted successfully.');
    redirect_to(url_for('/index.php'));
} else {
    // display form
}
?>

<?php require_once(SHARED_PATH . '/header.php'); ?>

    <div class="header shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Book queue for deletion: <?php echo h($book->title); ?></h1>
    </div>

    <div class="main shadow-sm p-3 mb-5 bg-white rounded">
        <div class="action text-center">
            <a href="<?php echo url_for('/index.php'); ?>">Go Back</a>
        </div>

        <div class="content shadow-lg p-3 mb-5 bg-white rounded text-center">
            <h4><?php echo h($book->title); ?></h4>
            <p>Are you sure you want to delete this book?</p>

            <form action="<?php echo url_for('/staff/books/delete.php?id=' . h(u($book->id))); ?>" method="post">

                <div class="form-group button">
                    <button type="submit" class="btn btn-primary">Delete Book</button>
                </div>

            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>