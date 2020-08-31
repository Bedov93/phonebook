<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css?v=<?= time() ?>">
    <style>
        #register-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        #register-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        #register-form h2 {
            margin: 0 0 15px;
        }
        #register-form, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php print_r(isset($errors['logn']) ? 'has-error': ''); ?>
<div id="register-form">
    <form action="/register" method="post">
        <h2 class="text-center">Register</h2>
        <div class="form-group">
            <input type="text" name="login" class="form-control
            <?= isset($errors['login']) ? 'is-invalid': '' ?>"
                   placeholder="Username" required="required"
                   value="<?= isset($oldValue['login']) ? trim($oldValue['login']) : ''?>">
            <?php if(isset($errors['login'])) : ?>
            <small id="loginHelp" class="text-danger">
                <?= $errors['login'] ?>
            </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control
            <?= isset($errors['email']) ? 'is-invalid': '' ?>"
                   placeholder="Email" required="required"
                   value="<?= isset($oldValue['email']) ? trim($oldValue['email']) : ''?>">
            <?php if(isset($errors['email'])) : ?>
                <small id="emailHelp" class="text-danger">
                    <?= $errors['email'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input type="text" name="password" class="form-control
            <?= isset($errors['password']) ? 'is-invalid': '' ?>"
                   placeholder="Password" required="required">
            <?php if(isset($errors['password'])) : ?>
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
            <?= isset($errors['captcha']) ? 'is-invalid': '' ?>" placeholder="Code" required="required">
            <?php if(isset($errors['captcha'])) : ?>
                <small id="captchalHelp" class="text-danger">
                    <?= $errors['captcha'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" onclick="return auth(this.form);">Register</button>
        </div>
        <div class="form-group">
            <a href="/login">Login</a>
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


