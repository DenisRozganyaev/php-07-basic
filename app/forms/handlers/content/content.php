<?php

function editContent(): void
{
    $fields = $_POST;
    $name = filter_input(INPUT_POST, 'block_name');
    $id = filter_input(INPUT_POST, 'block_id', FILTER_VALIDATE_INT);

    if (!$id) {
        notify('Can not find block id', "danger");
        redirectBack();
    }

    unset($fields['block_name'], $fields['block_id']);

    match ($name) {
        'navigation' => updateNavigationBlock($id, $fields),
        default => redirectBack()
    };
}

function uploadContentImage(string $tmpName, string $path, int $id): void
{
    if (!move_uploaded_file($tmpName, $path)) {
        notify("We can not upload this file", "danger");
        redirectBack();
    }
}

function getContentQuery(): PDOStatement
{
    $sql = "UPDATE " . Tables::Content->value . " SET content = :content WHERE id = :id";
    return DB::connect()->prepare($sql);
}

function executeContentQuery(PDOStatement $query, int $id): void
{
    if ($query->execute()) {
        notify("Block was successfully updated!");
    } else {
        notify("Something went wrong!", "danger");
    }

    redirect("/admin/content/edit/$id");
}
