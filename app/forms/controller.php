<?php

 match(getRequestType()) {
     'register' => createUserHandler(createUserParams()),
     'login' => authUserHandler(authUserParams()),
     'create_product' => createProduct(createProductParams()),
     'remove_product' => removeProduct(removeProductParam()),
     'edit_product' => editProduct(editProductParams()),
     default => redirectBack()
 };
