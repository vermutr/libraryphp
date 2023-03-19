<script type="text/javascript">
    function addBook(id) {
        const data = {book_id:id}
        fetch("/addBook", {
            method: "POST",
            headers: {
                'Content-type' : 'application/json'
            },
            body:JSON.stringify(data)
        })
    }
</script>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/booklist.css">
    <title>Book list</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="user-info">
        <span>All available books</span>
    </div>
    <div class="book-list">
        <section>
            <?php
            if (isset($books)) {
                foreach ($books as $book) { ?>
                    <div class="book-item">
                        <div class="img-container">
                            <img src="/public/img/<?= $book->getImg() ?>">
                        </div>
                        <div class="book-info">
                            <span class="book-name"><?= $book->getBookName() ?></span>
                            <span class="book-author"><?= $book->getAuthor()->getName() . " " . $book->getAuthor()->getSurname() ?></span>
                            <span class="book-price"><?= $book->getPrice() ?> $</span>
                        </div>
                        <div class="add-buy-buttons">
                            <form action="/addBook" method="POST" id="<?=$book->getId()?>" class="add-button">
                                <input name="book" id="<?=$book->getId()?>" value="<?=$book->getId()?>" style="display: none"/>
                                <button type="submit" class="button-add-buy">
                                    Add to list
                                </button>
                            </form>
                            <form action="/buyBook" method="POST" id="<?=$book->getId()?>" class="buy-button">
                                <input name="book" id="<?=$book->getId()?>" value="<?=$book->getId()?>" style="display: none"/>
                                <button type="submit" class="button-add-buy">
                                    Buy
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