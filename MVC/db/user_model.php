<?php
require_once __DIR__ . "/db.php";

function user_find_by_username(string $username): ?array
{
    global $conn;

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = ? LIMIT 1"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
    return $user ?: null;
}

function user_find_by_id(int $id): ?array
{
    global $conn;

    $stmt = $conn->prepare(
        "SELECT username, name, id_number, phone, location, area
         FROM users WHERE id = ? LIMIT 1"
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
    return $user ?: null;
}

function user_create(
    string $username,
    string $password_hash,
    string $name,
    string $id_number,
    string $phone,
    string $location,
    ?string $area,
    string $role
): bool {
    global $conn;

    $stmt = $conn->prepare(
        "INSERT INTO users 
         (username, password, name, id_number, phone, location, area, role)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssssss",
        $username,
        $password_hash,
        $name,
        $id_number,
        $phone,
        $location,
        $area,
        $role
    );

    $ok = $stmt->execute();
    $stmt->close();

    return $ok;
}

function user_update_profile(
    int $id,
    string $name,
    string $phone,
    string $location,
    ?string $area
): bool {
    global $conn;

    $stmt = $conn->prepare(
        "UPDATE users
         SET name = ?, phone = ?, location = ?, area = ?
         WHERE id = ?"
    );

    $stmt->bind_param("ssssi", $name, $phone, $location, $area, $id);
    $ok = $stmt->execute();
    $stmt->close();

    return $ok;
}
