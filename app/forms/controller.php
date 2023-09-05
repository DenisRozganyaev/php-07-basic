<?php

 match(getRequestType()) {
     'register' => createUserHandler(createUserParams()),
     'login' => authUserHandler(authUserParams()),
     'create_product' => '',
     default => redirectBack()
 };
