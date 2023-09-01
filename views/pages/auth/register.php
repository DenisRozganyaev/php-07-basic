<?php
require PARTS_DIR . 'header.php';
?>
<section id="register" class="section-gap">
    <div class="container">
        <div class="row">
            <main class="w-25 m-auto mt-5 pt-5">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="register" />
                    <h1 class="h3 mb-3 fw-normal">Registration</h1>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your name.." autofocus>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Your surname..">
                        <label for="surname">Surname</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password Confirmation">
                        <label for="password_confirm">Password Confirmation</label>
                    </div>
                    <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Create an account</button>
                </form>
            </main>
        </div>
    </div>
</section>
<?php
require PARTS_DIR . 'footer.php';
