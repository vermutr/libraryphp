<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <title>Profile</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="user-info">
        <span>It is your book list</span>
    </div>
    <div class="book-list">
        <section>
            <?php
            if (isset($books)) {
                foreach ($books as $book) { ?>
                    <div class="book-item" <?= $book->getId() ?>>
                        <div class="img-container">
                            <img src="/public/img/<?= $book->getImg() ?>">
                        </div>
                        <div class="book-info">
                            <span class="book-name"><?= $book->getBookName() ?></span>
                            <span class="book-author"><?= $book->getAuthor()->getName() . " " . $book->getAuthor()->getSurname() ?></span>
                            <span class="book-price"><?= $book->getPrice() ?> $</span>
                        </div>
                        <div class="delete-button-container">
                            <form action="/deleteBook" method="POST" id="<?=$book->getId()?>" class="delete-button">
                                <input name="book" id="<?=$book->getId()?>" value="<?=$book->getId()?>" style="display: none"/>
                                <button type="submit" class="button-delete">
                                    Delete from my list
                                </button>
                            </form>
                        </div>
                    </div>
                <?php }
            } ?>
        </section>
    </div>
</div>
</body>
</html>