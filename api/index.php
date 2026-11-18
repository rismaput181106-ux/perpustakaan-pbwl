<?php

// 1. Autoloader
require __DIR__.'/../vendor/autoload.php';

// 2. Set folder sementara ke /tmp SEBELUM aplikasi booting
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';
putenv('VIEW_COMPILED_PATH=/tmp');

// 3. Boot aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// 4. Paksa storage & cache ke /tmp
$app->useStoragePath('/tmp');

// 5. Jalankan
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);