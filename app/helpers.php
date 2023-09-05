<?php

function getUrl(): string
{
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $uri)[0];
}

function getContent(string $condition = null, bool $isSingle = false): array
{
    $rows = dbSelect(Tables::Content, condition: $condition, isSingle: $isSingle);
    $result = [];

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $result[$row['name']] = json_decode($row['content'], true);
        }
    }

    return $result;
}

function getRequestType(): string
{
    $type = filter_input(INPUT_POST, 'type');
    unset($_POST['type']);

    return htmlspecialchars($type);
}

function redirect(string $path = '/'): void
{
    $url = DOMAIN . $path;
    header("Location: $url");
    exit;
}

function redirectBack(): void
{
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: $url");
    exit;
}

function conditionRedirect(bool $condition = false, string $path = '/'): void
{
    if ($condition) {
        redirect($path);
    }
}

function emptyFields(array $fields, SESSION_KEYS $key): bool
{
    $result = false;
    $emptyFields = array_keys($fields, null);

    if (!empty($emptyFields)) {
        foreach ($emptyFields as $fieldName) {
            $_SESSION[$key->value]['errors'][$fieldName] = "Field '$fieldName' is empty";
        }
        $result = true;
    }

    return $result;
}

function formError(string|null $message = null): string
{
    $template = '<div class="mb-1 d-flex"><span class="alert alert-danger w-100 mt-1 mb-0 pb-1 pt-1" role="alert">%s</span></div>';
    return $message ? sprintf($template, $message) : '';
}
