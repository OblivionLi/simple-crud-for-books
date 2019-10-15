<?php include_once('../private/initialize.php'); ?>

<?php

$total_count = Book::count_all();
$books = Book::find_all();

?>

<?php require_once(SHARED_PATH . '/header.php'); ?>

<div class="header shadow-sm p-3 mb-5 bg-white rounded">
    <h1>Simple CRUD for BOOKS</h1>
</div>


<div class="main shadow-sm p-3 mb-5 bg-white rounded">
    <div class="action text-center">
        <a href="<?php echo url_for('/staff/books/create.php'); ?>">Add a new book</a>
    </div>

    <div class="tableContent shadow-lg p-3 mb-5 bg-white rounded">

        <div id="hide">
            <?php echo display_session_message(); ?>
        </div>

        <table class="table table-hover" id="myTable">
            <thead>
            <tr>

                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($books as $book) { ?>
                <tr>

                    <td>
                        <a href="
            <?php echo url_for('/staff/books/show.php?id=' . h($book->id)); ?>">
                            <?php echo h($book->title); ?></a>
                    </td>
                    <td><?php echo h($book->author); ?></td>
                    <td><?php echo h($book->date); ?></td>
                    <td>
                        <a href="
            <?php echo url_for('/staff/books/update.php?id=' . h($book->id)); ?>">Edit</a>
                        <span class="actionDivider">/</span>
                        <a href="
            <?php echo url_for('/staff/books/delete.php?id=' . h($book->id)); ?>">Delete</a>
                    </td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>

