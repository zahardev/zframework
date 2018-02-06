<form action="" method="post">
    <div>
        <label for="news_title">Title</label>
        <input type="text" id="news_title" name="news_title" />
    </div>
    <div>
        <label for="news_content">Description</label>
        <textarea cols="40" rows="5" id="news_content" name="news_content"></textarea>
    </div>
    <div>
        <label for="news_date">Date</label>
        <input type="text" id="news_date" name="news_date" value="<?php echo date('Y-m-d'); ?>" />
    </div>
    <div>
        <input type="submit" value="Add">
    </div>
</form>