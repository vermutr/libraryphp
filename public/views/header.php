<script type="text/javascript">
    function clearCookie() {
        const cookies = document.cookie.split(";");

        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i];
            const eqPos = cookie.indexOf("=");
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }
</script>

<div class="header">
    <img class="logo" src="/public/img/logo.svg">
    <nav>
        <ul class="nav_links">
            <li>
                <a href="/main" class="homepage">Homepage</a>
            </li>
            <li>
                <a href="/contacts" class="contacts">Contacts</a>
            </li>
            <li>
                <a id="logout" onclick='clearCookie()' href="/login" class="exit"><img src="/public/img/exit.svg"></a>
            </li>
            <li>
                <a href="/cart" class="cart"><img src="/public/img/cart.svg"></a>
            </li>
            <li>
                <a href="/profile" class="profile"><img src="/public/img/profile.svg"></a>
            </li>
        </ul>
    </nav>
</div>