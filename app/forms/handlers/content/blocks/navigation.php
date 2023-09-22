<?php

function updateNavigationBlock(int $id, array $fields): void
{
    $block = dbFind(Tables::Content, $id);
    $blockContent = json_decode($block['content'], true);
    $links = $fields['links'] ?? [];
    $content = json_encode([
        'logo' => uploadNavigationLogo($blockContent['logo'] ?? '', $id),
        'links' => array_values($links)
    ]);

    $query = getContentQuery();
    $query->bindParam('content', $content);
    $query->bindParam('id', $id, PDO::PARAM_INT);

    executeContentQuery($query, $id);
}

function uploadNavigationLogo(string $image, int $id): string
{
    if (!empty($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $newImageName = time() . "_{$_FILES['logo']['name']}";
        $path = IMAGES_DIR . '/' . $newImageName;

        uploadContentImage($_FILES['logo']['tmp_name'], $path, $id);

        $oldFile = IMAGES_DIR . '/' . $image;
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        return $newImageName;
    }

    return $image;
}
