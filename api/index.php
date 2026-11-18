<?php

// WAJIB: Panggil autoloader Composer
require __DIR__.'/../vendor/autoload.php';

// Paksa Laravel nulis file sementara ke folder /tmp (karena Vercel Read-Only)
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->useStoragePath('/tmp');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);