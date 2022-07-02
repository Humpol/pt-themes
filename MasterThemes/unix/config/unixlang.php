<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Unix Template by Mubeen
    | English Translated by Mubeen
    |--------------------------------------------------------------------------
    | This file contains the language for the Unix Template, if you have translated it to a new language, 
    | please message me on Discord mubeen#9621 and it will be added to the theme languages
    | this language file only covers language strings related to the theme.
    */

    'system_lang' => 'English',

    /*
    |--------------------------------------------------------------------------
    | Sidebar & Homepage
    |--------------------------------------------------------------------------
    */

    'menu' => 'MENU',
    'user_settings' => 'USER SETTINGS',
    'search' => 'Search',

    'servers' => 'Servers',
    'console' => 'Console',
    'files' => 'Files',
    'databases' => 'Databases',
    'schedules' => 'Schedules',
    'users' => 'Users',
    'backups' => 'Backups',
    'network' => 'Network',
    'startup' => 'Startup',
    'settings' => 'Settings',
    'manage' => 'Manage',
    
    'admin' => 'Admin',
    'configure' => 'Configure',
    'account' => 'Account',
    'account_api' => 'Account API',
    'logout' => 'Logout',
































    






    'exceptions' => [
        'report_all' => env('APP_REPORT_ALL_EXCEPTIONS', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Application Service Providers...
         */
        Pterodactyl\Providers\AppServiceProvider::class,
        Pterodactyl\Providers\AuthServiceProvider::class,
        Pterodactyl\Providers\BackupsServiceProvider::class,
        Pterodactyl\Providers\BladeServiceProvider::class,
        Pterodactyl\Providers\EventServiceProvider::class,
        Pterodactyl\Providers\HashidsServiceProvider::class,
        Pterodactyl\Providers\RouteServiceProvider::class,
        Pterodactyl\Providers\RepositoryServiceProvider::class,
        Pterodactyl\Providers\ViewComposerServiceProvider::class,

        /*
         * Additional Dependencies
         */
        Prologue\Alerts\AlertsServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
        'Alert' => Prologue\Alerts\Facades\Alert::class,
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Carbon' => Carbon\Carbon::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Input' => Illuminate\Support\Facades\Input::class,
        'Javascript' => Laracasts\Utilities\JavaScript\JavaScriptFacade::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Theme' => Pterodactyl\Extensions\Facades\Theme::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
    ],
];