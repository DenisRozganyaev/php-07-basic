<?php
require ADMIN_PARTS_DIR . 'header.php';
?>
    <section id="email" class="section-gap">
        <div class="container">
            <div class="row">
                <main class="w-25 m-auto mt-5 pt-5">
                    <form action="/" method="POST">
                        <?= formError($error ?? null) ?>
                        <input type="hidden" name="type" value="send_mail" />
                        <h1 class="h3 mb-3 fw-normal">Create a mail</h1>
                        <div class="form-floating mt-2">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                   placeholder="name@example.com">
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" class="form-control" id="floatingInput" name="subject"
                                   value="<?= $fields['email'] ?? '' ?>"
                                   placeholder="Put your subject"
                            />
                            <label for="floatingInput">Subject</label>
                        </div>
                        <div class="form-floating mt-2">
                            <textarea class="form-control" rows="10" name="body"></textarea>
                            <label for="floatingInput">Body</label>
                        </div>
                        <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Send email</button>
                    </form>
                </main>
            </div>
        </div>
    </section>
<?php
require ADMIN_PARTS_DIR . 'footer.php';
