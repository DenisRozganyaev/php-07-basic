<?php
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

