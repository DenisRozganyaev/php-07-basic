<?php

function authUserHandler(array $fields): void
{
    authValidation($fields);

    $user = dbSelect(Tables::Users, condition: "email = '{$fields['email']}'", isSingle: true);

    if (empty($user) || !password_verify($fields['password'], $user['password'])) {
        $_SESSION[SESSION_KEYS::LOGIN->value]['error'] = 'Email or password is invalid';
        redirect('/login');
    }

    authUser($user['id'], $user['is_admin']);
    flushSessionByKey(SESSION_KEYS::LOGIN);
    redirect();
}

function authValidation(array $fields): void
{
    updateSessionFields(SESSION_KEYS::LOGIN, $fields);
    conditionRedirect(emptyFields($fields, SESSION_KEYS::LOGIN), '/login');
}
