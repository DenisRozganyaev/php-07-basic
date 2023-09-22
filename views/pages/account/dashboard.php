<?php
require_once ACCOUNT_PARTS_DIR . '/header.php';
extract(formSessionData(SESSION_KEYS::UPDATE_USER));
?>
    <section id="register" class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <main class="w-50 m-auto mt-5 pt-5">
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="update_user_info" />
                            <h1 class="h3 mb-3 fw-normal">User info</h1>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your name.."
                                       value="<?= $fields['name'] ?? $user['name'] ?>"
                                       autofocus>
                                <label for="name">Name</label>
                            </div>
                            <?= formError($errors['name'] ?? null) ?>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="surname" name="surname"
                                       value="<?= $fields['surname'] ?? $user['surname'] ?>"
                                       placeholder="Your surname..">
                                <label for="surname">Surname</label>
                            </div>
                            <?= formError($errors['surname'] ?? null) ?>
                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                       value="<?= $fields['email'] ?? $user['email'] ?>"
                                       placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <?= formError($errors['email'] ?? null) ?>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="balance" name="balance"
                                       value="<?= $fields['balance'] ?? $user['balance'] ?>"
                                       placeholder="Your balance..">
                                <label for="balance">Balance</label>
                            </div>
                            <?= formError($errors['balance'] ?? null) ?>
                            <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Update info</button>
                        </form>
                    </main>
                </div>
                <div class="col">
                    <main class="w-50 m-auto mt-5 pt-5">
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="update_user_password" />
                            <h1 class="h3 mb-3 fw-normal">Change password</h1>
                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="oldPass" name="old_password" placeholder="Old Password">
                                <label for="oldPass">Old Password</label>
                            </div>
                            <?= formError($errors['password'] ?? null) ?>
                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="New Password">
                                <label for="floatingPassword">New Password</label>
                            </div>
                            <?= formError($errors['password'] ?? null) ?>
                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password Confirmation">
                                <label for="password_confirm">Password Confirmation</label>
                            </div>
                            <?= formError($errors['password_confirm'] ?? null) ?>
                            <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Update password</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </section>
<?php
require_once ACCOUNT_PARTS_DIR . '/footer.php';
