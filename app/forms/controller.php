<?php

 match(getRequestType()) {
     'register' => createUserHandler(createUserParams()),
     'login' => '',
     default => redirectBack()
 };
