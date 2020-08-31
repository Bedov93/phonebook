<html lang="en">

<head>

    <meta charset="utf-8">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css?v=<?= time() ?>">
</head>

<body>

<div id="register-form">
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <form action="/login" method="post">
        <h2 class="text-center">Login</h2>
        <div class="form-group">
            <input type="text" name="login" class="form-control
            <?= isset($errors['login']) ? 'is-invalid' : '' ?>"
                   placeholder="Username" required="required"
                   value="<?= isset($oldValue['login']) ? trim($oldValue['login']) : '' ?>">
            <?php if (isset($errors['login'])) : ?>
                <small id="loginHelp" class="text-danger">
                    <?= $errors['login'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control
            <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                   placeholder="Password" required="required">
            <?php if (isset($errors['password'])) : ?>
                <small id="passwordlHelp" class="text-danger">
                    <?= $errors['password'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <img src="main/captcha">
        </div>
        <div class="form-group">
            <input type="text" name="captcha" class="form-control
            <?= isset($errors['captcha']) ? 'is-invalid' : '' ?>" placeholder="Code" required="required">
            <?php if (isset($errors['captcha'])) : ?>
                <small id="captchalHelp" class="text-danger">
                    <?= $errors['captcha'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <div class="form-group">
            <a href="/register">Register</a>
        </div>
    </form>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>


