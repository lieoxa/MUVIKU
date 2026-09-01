<?php

/**
 * Vercel Serverless Entrypoint for Laravel 10
 */

// Initialize writable directories in /tmp for Vercel Serverless environment
$tmpDirectories = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/cache/data',
    '/tmp/sessions',
    '/tmp/logs',
];

foreach ($tmpDirectories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Forward request to standard Laravel public/index.php
require __DIR__ . '/../public/index.php';
