<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
   // Makes reading things below nicer,
   // and simpler to change out script that's used.
   public $aliases = [
      'csrf'     => \CodeIgniter\Filters\CSRF::class,
      'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
      'honeypot' => \CodeIgniter\Filters\Honeypot::class,
      'adminfilters'  => \App\Filters\AdminFilters::class,
   ];

   // Always applied before every request
   public $globals = [
      'before' => [
         'adminfilters'  => ['except'    => [
            'auth', 'auth/*',
            'home', 'home/*',
            '/'
         ]],

         //'honeypot'
         // 'csrf',
      ],
      'after'  => [
         'adminfilters'  => ['except'    => [
            'admin', 'admin/*',
            'home', 'home/*',
            'faculity', 'faculity/*',
            'building', 'building/*',
            'room', 'room/*',
            'prody', 'prody/*',
            'schoolyear', 'schoolyear/*',
            'course', 'course/*',
            'user', 'user/*',
            'lecturer', 'lecturer/*',
            '/'
         ]],

         'toolbar',
         //'honeypot'
      ],
   ];

   // Works on all of a particular HTTP method
   // (GET, POST, etc) as BEFORE filters only
   //     like: 'post' => ['CSRF', 'throttle'],
   public $methods = [];

   // List filter aliases and any before/after uri patterns
   // that they should run on, like:
   //    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
   public $filters = [];
}
