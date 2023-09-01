<?php
require PARTS_DIR . 'header.php';
?>
    <section id="register" class="section-gap">
        <div class="container">
            <div class="row">
                <main class="w-25 m-auto mt-5 pt-5">
                    <form action="/" method="POST">
                        <input type="hidden" name="type" value="login" />
                        <h1 class="h3 mb-3 fw-normal">Sign In</h1>
                        <div class="form-floating mt-2">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Sign In</button>
                    </form>
                </main>
            </div>
        </div>
    </section>
<?php
require PARTS_DIR . 'footer.php';
