<?php

function addSubscriber(string $email): void
{
    $checkOnEmail = dbSelect(Tables::Newsletter, condition: "email = '$email'", isSingle: true);

    if ($checkOnEmail) {
        notify("Email already exists", "info");
        redirectBack();
    }

    $sql = "INSERT INTO " . Tables::Newsletter->value . " (email) VALUES (:email)";
    $query = DB::connect()->prepare($sql);
    $query->bindParam('email', $email);

    if (!$query->execute()) {
        notify("Something went wrong. Please, try again", "danger");
        redirectBack();
    }

    notify("Thank you. You were added to our newsletter subscribers");
    redirectBack();
}
