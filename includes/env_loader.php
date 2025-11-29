<?php

function loadEnv($path): void {
    if (!file_exists(filename: $path)) {
        throw new Exception(message: ". env file not found at {$path}");
    }

    $lines = file(filename: $path, flags: FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim(string: $line);
        if ($line === '' || str_starts_with(haystack: $line, needle: '#' )) continue;

        list($name, $value) = explode(separator: '=', string: $line, limit: 2);
        $name = trim(string: $name);
        $value = trim(string: $value);

        $value = trim(string: $value, characters: '"\'');

        $_ENV[$name] = $value;
        putenv(assignment: "$name=$value");
    }
}
?>