<?php

 match(getRequestType()) {
     'register' => createUserHandler(createUserParams()),
     'login' => authUserHandler(authUserParams()),
     'create_product' => createProduct(createProductParams()),
     'remove_product' => removeProduct(removeProductParam()),
     'remove_cart_item' => removeCartItem(removeCartItemParam()),
     'create_order' => createOrder(),
     'edit_product' => editProduct(editProductParams()),
     'add_to_cart' => addToCart(addToCartParams()),
     'update_user_info' => updateUserInfo(updateUserInfoParams()),
     'update_user_password' => updateUserPassword(updateUserPasswordParams()),
     default => redirectBack()
 };
