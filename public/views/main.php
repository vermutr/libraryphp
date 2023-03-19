<script type="text/javascript">
    window.onload = function () {
        document.getElementById("desktop-button").onclick = function () {
            location.href = "http://".concat(window.location.host).concat("/books");
        };
    }
</script>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <title>Main page</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
    <div class="main-content">
        <div class="main-info">
            <span class="title-info">Your Favorite Reading Site</span>
            <span class="info">Online store where you can order books</span>
            <button id="desktop-button" class="desktop-button">Book list</button>
        </div>
        <img class="book-img" src="/public/img/book.svg">
    </div>
    <div class="mobile-button-container">
        <button id="mobile-button" class="mobile-button">Book list</button>
    </div>
    <?php include('footer.php') ?>
</div>
</body>