<?php

/**
 * Production-ready Vercel Serverless Entrypoint for Laravel 10
 */

// Enable error reporting to capture startup diagnostics
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

try {
    // 1. Prepare writable directories in /tmp for Vercel read-only Lambda
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

    // 2. Set environment variables for writable paths
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

    // Set fallback drivers if not explicitly defined in Vercel Dashboard
    if (!getenv('CACHE_DRIVER')) putenv('CACHE_DRIVER=array');
    if (!getenv('SESSION_DRIVER')) putenv('SESSION_DRIVER=cookie');
    if (!getenv('LOG_CHANNEL')) putenv('LOG_CHANNEL=stderr');

    // 3. Autoload & Bootstrap Laravel
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        throw new \Exception("vendor/autoload.php not found at {$autoload}. Composer packages must be included or installed.");
    }

    define('LARAVEL_START', microtime(true));

    require $autoload;

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Explicitly configure Laravel to use the writable /tmp/storage path
    $app->useStoragePath($storagePath);

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    )->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='font-family:sans-serif;padding:30px;background:#111215;color:#fff;min-height:100vh;'>";
    echo "<h2 style='color:#FFAE1F;margin-top:0;'>MUVIKU — Server Diagnostic</h2>";
    echo "<p style='color:#ef4444;font-weight:bold;font-size:16px;'>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p style='color:#94a3b8;'><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")</p>";
    echo "<h4 style='margin-top:20px;color:#cbd5e1;'>Stack Trace:</h4>";
    echo "<pre style='background:#1e222d;padding:16px;border-radius:10px;color:#e2e8f0;overflow-x:auto;font-size:13px;line-height:1.5;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
