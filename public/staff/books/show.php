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
?>

<?php require_once(SHARED_PATH . '/header.php'); ?>

    <div class="header shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Title: <?php echo h($book->title); ?></h1>
        <h5>Author: <?php echo h($book->author); ?></h5>
        <h5>Year published: <?php echo h($book->date); ?></h5>
    </div>

    <div id="hide2">
        <?php echo display_session_message(); ?>
    </div>

    <div class="main shadow-sm p-3 mb-5 bg-white rounded">
        <div class="action text-center">
            <a href="<?php echo url_for('/index.php'); ?>">Go Back</a>
        </div>

        <div class="content shadow-lg p-3 mb-5 bg-white rounded">
            <p>
                <?php echo nl2br(h($book->content)); ?>
            </p>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>