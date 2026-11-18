<?php

// 1. Panggil autoloader Composer
require __DIR__ . '/../vendor/autoload.php';

// 2. Panggil aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Paksa Laravel nulis file sementara ke /tmp (karena Vercel Read-Only)
$app->useStoragePath('/tmp');

// 4. Jalankan aplikasi
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);