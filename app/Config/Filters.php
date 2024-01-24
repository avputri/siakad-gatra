<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, array<int, string>|string> [filter_name => classname]
     *                                               or [filter_name => [classname1, classname2, ...]]
     * @phpstan-var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'FilterAdmin'   => \App\Filters\FilterAdmin::class,
        'FilterGuru'   => \App\Filters\FilterGuru::class,
        'FilterSiswa'   => \App\Filters\FilterSiswa::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            'FilterAdmin' => [
                'except' => [
                    '/',
                    'Auth', 'Auth/*',
                ]
            ],
            'FilterGuru' => [
                'except' => [
                    '/',
                    'Auth', 'Auth/*',
                ]
            ],
            'FilterSiswa' => [
                'except' => [
                    '/',
                    'Auth', 'Auth/*',
                ]
            ],

        ],
        'after' => [
            'toolbar',
            'FilterAdmin' => [
                'except' => [
                    '/',
                    'DashboardAdmin', 'DashboardAdmin/*',
                    'Jurusan', 'Jurusan/*',
                    'Kelas', 'Kelas/*',
                    'Mapel', 'Mapel/*',
                    'Ta', 'Ta/*',
                    'Rombel', 'Rombel/*',
                    'Guru', 'Guru/*',
                    'Siswa', 'Siswa/*',
                    'User', 'User/*',
                    'JadwalPelajaran', 'JadwalPelajaran/*',
                    'NilaiSiswa', 'NilaiSiswa/*',
                    'RaporSiswa', 'RaporSiswa/*',
                ]
            ],
            'FilterGuru' => [
                'except' => [
                    '/',
                    'DashboardGuru', 'DashboardGuru/*',
                    'PrintNilai', 'PrintNilai/*',
                    'RaporSiswa', 'RaporSiswa/*',
                ]
            ],
            'FilterSiswa' => [
                'except' => [
                    '/',
                    'DashboardSiswa', 'DashboardSiswa/*',

                ]
            ],


        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
