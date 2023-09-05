<?php

function createUserHandler(array $fields): void
{
    createUserValidation($fields);

    $sql = "INSERT INTO " . Tables::Users->value . " (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
    $query = DB::connect()->prepare($sql);

    $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
    unset($fields['password_confirm']);

    $query->execute($fields);
    flushSessionByKey(SESSION_KEYS::REGISTER);
    redirect('/login');
}

function createUserValidation(array $fields): void
{
    updateSessionFields(SESSION_KEYS::REGISTER, $fields);
    $isEmptyFields = emptyFields($fields, SESSION_KEYS::REGISTER);
    $isPasswordValid = passwordValidation($fields['password'], $fields['password_confirm']);
    $isEmailExists = !empty(dbSelect(Tables::Users, condition: "email = '{$fields['email']}'", isSingle: true));

    if ($isEmptyFields || !$isPasswordValid || $isEmailExists) {
        redirect('/register');
    }
}

function passwordValidation(string $password, string $passwordConfirm): bool
{
    $result = true;
    if (strlen($password) < 8) {
        $_SESSION[SESSION_KEYS::REGISTER->value]['errors']['password'] = "Password length should be more than 7 symbols.";
        $result = false;
    }

    if ($password !== $passwordConfirm) {
        $_SESSION[SESSION_KEYS::REGISTER->value]['errors']['password_confirm'] = "Passwords are not equal.";
        $result = false;
    }

    return $result;
}
