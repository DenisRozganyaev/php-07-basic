<?php

function addSubscriber(string $email): void
{
    $checkOnEmail = dbSelect(Tables::Newsletter, condition: "email = '$email'", isSingle: true);

    if ($checkOnEmail) {
        notify("Email already exists", "info");
        redirectBack();
    }

    $sql = "INSERT INTO " . Tables::Newsletter->value . " (email, unsubscribe_hash) VALUES (:email, :unsubscribe_hash)";
    $query = DB::connect()->prepare($sql);
    $hash = password_hash($email, PASSWORD_BCRYPT);
    $query->bindParam('email', $email);
    $query->bindParam('unsubscribe_hash', $hash);

    if (!$query->execute()) {
        notify("Something went wrong. Please, try again", "danger");
        redirectBack();
    }

    notify("Thank you. You were added to our newsletter subscribers");
    redirectBack();
}

function sendMail(array $fields): void
{
    if (empty($fields['emails'])) {
        notify("You should select emails from list", "warning");
        redirectBack();
    }
    if (empty($fields['body'])) {
        notify("Body should not be empty", "danger");
        redirectBack();
    }
    extract($fields);

    $fields['emails'] = array_map(fn($email) => "'$email'", $fields['emails']);
    $inEmails = implode(', ', $fields['emails']);
    $subscribers = dbSelect(Tables::Newsletter, condition: "email IN ($inEmails)");

    $headers = [];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: Coffee Admin <admin@coffee.com>';

    foreach ($subscribers as $subscriber) {
        $unsubscribeHash = $subscriber['unsubscribe_hash'];
        ob_start();
        include PARTS_DIR . 'emails/template.php';
        $template = ob_get_clean();

        mail(
            $subscriber['email'],
            $fields['subject'] ?? 'Subject',
            $template,
            implode("\r\n", $headers)
        );
    }

    notify('Emails were sent!');
    redirectBack();
}

function unsubscribe(): void
{
    $hash = filter_input(INPUT_GET, 'hash');

    $sql = "DELETE FROM " . Tables::Newsletter->value . " WHERE unsubscribe_hash = :hash";
    $query = DB::connect()->prepare($sql);
    $query->bindParam('hash', $hash);
}
