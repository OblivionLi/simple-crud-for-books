<?php
if (!isset($book)) {
    redirect_to(url_for('/index.php'));
}
?>

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="book[title]" value="<?php echo h($book->title); ?>" class="form-control" id="title"
           placeholder="Enter the book title..">
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="book[author]" value="<?php echo h($book->author); ?>" class="form-control" id="author"
                   placeholder="Enter the book author..">
        </div>
    </div>

    <div class="col">
        <div class="form-group date">
            <label for="date">Date</label>
            <select class="form-control" name="book[date]" id="date">
                <?php $this_year = idate('Y'); ?>
                <?php for ($year = $this_year - 100; $year <= $this_year; $year++) { ?>
                    <option value="<?php echo $year; ?>"
                        <?php if ($book->date == $year) {
                            echo 'selected';
                        } ?>>
                        <?php echo $year; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="book[content]" id="content"
              rows="8" placeholder="Enter the content of the book here.."><?php echo h($book->content); ?></textarea>
</div>
