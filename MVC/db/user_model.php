<?php
require_once __DIR__ . "/db.php";

function user_find_by_username(string $username): ?array
{
    global $conn;

    $stmt = $conn->prepare("SELECT id, username, name, password, role FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();

    return $user ?: null;
}

function user_username_exists(string $username): bool
{
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;

    $stmt->close();

    return $exists;
}

function user_create_citizen(
    string $username,
    string $passwordHash,
    string $name,
    string $id_number,
    string $phone,
    string $location,
    ?string $area
): bool {
    global $conn;

    $role = "citizen";

    $stmt = $conn->prepare(
        "INSERT INTO users (username, password, name, id_number, phone, location, area, role)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param("ssssssss", $username, $passwordHash, $name, $id_number, $phone, $location, $area, $role);

    $ok = $stmt->execute();
    $stmt->close();

    return $ok;
}
