<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "DB_DATABASE: " . config('database.connections.mysql.database') . "\n";
echo "APP_URL: " . config('app.url') . "\n";
echo "APP_KEY length: " . strlen(config('app.key')) . "\n";
echo "SESSION_DRIVER: " . config('session.driver') . "\n";

// Test login programmatically
$user = App\Models\User::where('email', 'admin@test.com')->first();
if ($user) {
    echo "User found: " . $user->email . "\n";
    $check = Hash::check('password', $user->password);
    echo "Password check: " . ($check ? "MATCH" : "NO MATCH") . "\n";
} else {
    echo "User NOT found via Eloquent!\n";
}

