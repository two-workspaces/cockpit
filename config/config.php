<?php

// Cockpit signs its JWTs with `sec-key`, and upstream ships one public default
// for every install. Generate a key on first boot and keep it on the volume.
$keyFile = dirname(__DIR__).'/storage/.sec-key';
if ($f = @fopen($keyFile, 'x')) {
    fwrite($f, bin2hex(random_bytes(32)));
    fclose($f);
}

return [
    'sec-key' => trim((string) @file_get_contents($keyFile)) ?: null,
    'assets' => [
        'vips' => true,
        'ffmpeg' => true,
    ],
];
