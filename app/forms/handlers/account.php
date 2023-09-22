<?php

function updateUserInfo(array $fields)
{
    if (empty($fields['balance'])) {
        $fields['balance'] = 0;
    }

    $user = dbFind(Tables::Users, userId());
    updateUserValidation($fields, $user['email']);

    $fields['id'] = userId();

    $sql = "UPDATE " . Tables::Users->value . " SET name = :name, surname = :surname, email = :email, balance = :balance WHERE id = :id";
    $query = DB::connect()->prepare($sql);
    $query->execute($fields);
    flushSessionByKey(SESSION_KEYS::UPDATE_USER);
    notify('Account data was updated!');
    redirectBack();
}

function updateUserValidation(array $fields, string $userEmail): void
{
    updateSessionFields(SESSION_KEYS::UPDATE_USER, $fields);
    $isEmptyFields = emptyFields($fields, SESSION_KEYS::UPDATE_USER);
    $isEmailExists = $fields['email'] !== $userEmail && !empty(dbSelect(Tables::Users, condition: "email = '{$fields['email']}'", isSingle: true));
    $isValidBalance = ((float)$fields['balance']) >= 0;

    if (!$isValidBalance) {
        $_SESSION[SESSION_KEYS::UPDATE_USER->value]['errors']['balance'] = "Balance is not valid";
    }

    if ($isEmptyFields || $isEmailExists || !$isValidBalance) {
        redirectBack();
    }
}

function updateUserPassword(array $fields)
{

}
