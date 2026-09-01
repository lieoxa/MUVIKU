<?php

/**
 * Robust Production-ready Vercel Serverless Entrypoint for Laravel 10
 */

// Enable error reporting to capture startup diagnostics
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. In-code Environment Fallbacks for Vercel Serverless
$defaultEnv = [
    'APP_NAME' => 'MUVIKU',
    'APP_ENV' => 'production',
    'APP_KEY' => 'base64:OsehxSfpUPSpF7yq+/Uf5UX3x61Azio+gPVQYXiQC5s=',
    'APP_DEBUG' => 'true',
    'APP_URL' => 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
    'LOG_CHANNEL' => 'stderr',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'DB_CONNECTION' => 'pgsql',
    'DB_HOST' => 'aws-0-ap-northeast-1.pooler.supabase.com',
    'DB_PORT' => '5432',
    'DB_DATABASE' => 'postgres',
    'DB_USERNAME' => 'postgres.wkwzrnzxlbjddijtuhpi',
    'DB_PASSWORD' => 'M1pcAARrdB8PlJdu',
    'DB_SSLMODE' => 'require',
    'SUPABASE_URL' => 'https://wkwzrnzxlbjddijtuhpi.supabase.co',
    'TMDB_API_KEY' => '2dca580c2a14b55200e784d157207b4d',
];

foreach ($defaultEnv as $key => $value) {
    if (!getenv($key) && !isset($_ENV[$key])) {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

try {
    // 2. Prepare writable directories in /tmp for Vercel read-only Lambda
    $storagePath = '/tmp/storage';
    $subDirs = [
        $storagePath . '/framework/views',
        $storagePath . '/framework/cache',
        $storagePath . '/framework/cache/data',
        $storagePath . '/framework/sessions',
        $storagePath . '/framework/testing',
        $storagePath . '/logs',
        $storagePath . '/app/public',
    ];

    foreach ($subDirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }

    // 3. Set environment variables for writable paths
    putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
    putenv("APP_CONFIG_CACHE=/tmp/config.php");
    putenv("APP_EVENTS_CACHE=/tmp/events.php");
    putenv("APP_PACKAGES_CACHE=/tmp/packages.php");
    putenv("APP_ROUTES_CACHE=/tmp/routes.php");
    putenv("APP_SERVICES_CACHE=/tmp/services.php");
    
    $_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";
    $_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
    $_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
    $_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
    $_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
    $_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';

    // 4. Autoload & Bootstrap Laravel
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        throw new \Exception("vendor/autoload.php not found at {$autoload}. Composer packages must be included or installed.");
    }

    define('LARAVEL_START', microtime(true));

    require $autoload;

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Configure Laravel to use the writable /tmp/storage path
    $app->useStoragePath($storagePath);

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='font-family:sans-serif;padding:30px;background:#111215;color:#fff;min-height:100vh;'>";
    echo "<h2 style='color:#FFAE1F;margin-top:0;'>MUVIKU — Serverless Diagnostic</h2>";
    echo "<p style='color:#ef4444;font-weight:bold;font-size:16px;'>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p style='color:#94a3b8;'><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")</p>";
    echo "<h4 style='margin-top:20px;color:#cbd5e1;'>Stack Trace:</h4>";
    echo "<pre style='background:#1e222d;padding:16px;border-radius:10px;color:#e2e8f0;overflow-x:auto;font-size:13px;line-height:1.5;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
