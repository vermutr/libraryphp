<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/cart.css">
    <title>Cart</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="cart-info">
        <?php if (isset($books)) {?>
        <span>Your basket contains <?=sizeof($books)?> book!</span>
        <?php } else {
        ?>
        <span>Your basket contains 0 book!</span>
        <?php } ?>
    </div>
    <div class="cart-container">
        <div class="cart-content">
            <?php
            $total = 0;
            $bookIds = [];
            if (isset($books)) {
                foreach ($books as $book) {
                    array_push($bookIds, $book->getId());
                    $total += $book->getPrice()?>
                    <div class="book-info">
                        <div class="book-details">
                            <span><?= $book->getAuthor()->getName() . " " . $book->getAuthor()->getSurname() . " " . $book->getBookName() ?></span>
                        </div>
                        <div class="price-info">
                            <span><?= $book->getPrice() ?> $</span>
                        </div>
                    </div>
                    <div class="delete-button-container">
                        <form action="/deleteFromCart" method="POST" id="<?=$book->getId()?>" class="delete-button">
                            <input name="book" id="<?=$book->getId()?>" value="<?=$book->getId()?>" style="display: none"/>
                            <button type="submit" class="button-delete">
                                Delete
                            </button>
                        </form>
                    </div>
                <?php }
            } ?>
        </div>
        <div class="order-content">
            <div class="total-info">
                <span>TOTAL</span>
                <span>Sub-total <?=$total?> $</span>
                <span>You can pick up your order only at a stationary store</span>
                <span>You can pay for the order only in a stationary store</span>
            </div>
            <div class="order-button-container">
                <?php if (isset($books) && sizeof($books) !== 0) {?>
                    <form action="/order" method="POST" class="order-button">
                        <input name="book" value="<?=implode(',', $bookIds)?>" style="display: none"/>
                        <button type="submit" class="button-order">
                            Order
                        </button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>