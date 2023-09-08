<?php

/**
 *
 * SELECT * FROM content
 * dbSelect(Tables::Content);
 * SELECT id FROM content
 * dbSelect(Tables::Content, 'id');
 *
 * SELECT name, price FROM products WHERE price > 30 [AND|OR ....]
 * dbSelect(Tables::Products, 'name, price', 'price > 30 [AND|OR ....]');
 *
 * @param Tables $table
 * @param string $columns
 * @param string|null $condition
 * @return array
 */
function dbSelect(Tables $table, string $columns = '*', string $condition = null, string $order = null, bool $isSingle = false): array
{
    $sql = "SELECT {$columns} FROM {$table->value}";
    $sql .= $condition ? " WHERE {$condition}" : "";
    $sql .= $order ? " ORDER BY {$order}" : "";

    $query = DB::connect()->prepare($sql);
    $query->execute();

    $result = $isSingle ? $query->fetch() : $query->fetchAll();

    return $result ?: [];
}

function dbFind(Tables $table, int $id): array
{
    return dbSelect($table, condition: "id = $id", isSingle: true);
}
