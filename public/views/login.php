<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <title>Login page</title>
</head>
<body>
<div class="container">
    <div class="logo-welcome-content">
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
        <div class="welcome-content">
            <span class="welcome-text">Welcome to Verrom</span>
            <span class="info-text">We are glad that you are using our website.</span>
            <span class="info-text">We will do everything to make you feel comfortable!</span>
        </div>
    </div>

    <div class="sign-in-up-container">
        <div class="login-container">
            <form action="/login" method="POST">
                <?php
                if (isset($messagesSignIn)) {
                    foreach ($messagesSignIn as $message) {
                        echo $message;
                    }
                } else { ?>
                    <span>Sign in with existing account</span>
                    <?php
                }
                ?>
                <input name="email" type="text" placeholder="Email address">
                <input name="password" type="password" placeholder="Password">
                <input name="registered" type="text" value="true" style="display: none">
                <button type="submit">Sign in</button>
            </form>
        </div>
        <div class="registration-container">
            <form action="/login" method="POST">
                <?php
                if (isset($messagesSignUp)) {
                    foreach ($messagesSignUp as $message) {
                        echo $message;
                    }
                } else { ?>
                    <span>Not registered yet?</span>
                    <span>Create Verrom Account</span>
                    <?php
                }
                ?>
                <input name="email" type="text" placeholder="Email address">
                <input name="password" type="password" placeholder="Password">
                <input name="registered" type="text" value="false" style="display: none">
                <button type="submit">Sign up</button>
            </form>
        </div>
    </div>
</div>
</body>