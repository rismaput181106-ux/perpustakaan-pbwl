<?php

// 1. Panggil autoloader Composer
require __DIR__.'/../vendor/autoload.php';

// 2. Set environment biar nggak ngandelin cache /tmp
putenv('VIEW_COMPILED_PATH=/tmp');

// 3. Panggil aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// 4. JANGAN pake cache view, langsung render dari folder resources
$app->useStoragePath('/tmp');

// 5. Jalankan
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);