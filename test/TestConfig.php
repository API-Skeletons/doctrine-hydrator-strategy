<?php

return [
    // This should be an array of module namespaces used in the application.
    'modules' => [
        'Laminas\Filter',
        'Laminas\Hydrator',
        'Laminas\InputFilter',
        'Laminas\Paginator',
        'Laminas\Router',
        'Laminas\Validator',
        'Laminas\\ApiTools',
        'Laminas\\ApiTools\\Provider',
        'Laminas\\ApiTools\\ApiProblem',
        'Laminas\\ApiTools\\Configuration',
        'Laminas\\ApiTools\\OAuth2',
        'Laminas\\ApiTools\\MvcAuth',
        'Laminas\\ApiTools\\Hal',
        'Laminas\\ApiTools\\ContentNegotiation',
        'Laminas\\ApiTools\\ContentValidation',
        'Laminas\\ApiTools\\Rest',
        'Laminas\\ApiTools\\Rpc',
        'Laminas\\ApiTools\\Versioning',

        'DoctrineModule',
        'DoctrineORMModule',
        'Phpro\DoctrineHydrationModule',
        'Laminas\\ApiTools\\Doctrine\\Server',

        'ApiSkeletons\\Doctrine\\Hydrator\\Strategy',
        'Db',
        'DbApi',
    ],

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => [
            'Db' => __DIR__ . '/module/Db',
            'DbApi' => __DIR__ . '/module/DbApi',
        ],

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
    ],
];
