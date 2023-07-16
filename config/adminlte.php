<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'GYM',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>GYM</b>',
    'logo_img' => 'vendor/adminlte/dist/img/loginprueba1.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor\adminlte\dist\img\loginprueba1.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/loginprueba1.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,  // para que se quede fijo la parte derecha
    'layout_fixed_footer' => null,  //para que se quede fijo la parte superior
    'layout_dark_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'd-none',        //con esto aparece el registro y olvide mi contraseña d-none
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',    //  bg-white para ponerlo blanco la parte superior
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-dark elevation-4',   // para ponerlo blanco o negro la barra black
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'false',    //para quitar la barra lateral estaba con lg
    'sidebar_collapse' => false,    //para que el sidebar quede cerrado al ingresar al perfil
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */
    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,              //para habilitar el perfil de usuario


    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],
        ['header' => 'CONFIGURACION DE CUENTA'],

        [
            'text'       => 'Gestionar Usuario',    //PAQUE GESTIONAR USUARIO
            'icon'       => 'fas fa-folder',
            'submenu'    => [
                [
                    'text' => 'registrar usuario',
                    'route'  => 'cliente.create',
                    'icon' => 'fas fa-user-plus',
                    'can'   =>  'admin-access',
                ],
            ]
        ],

        [
            'text'       => 'Gestionar Perfil', //PAQUETE GESTIONAR PERFIL
            'icon'       => 'fas fa-folder',
            'submenu'    => [
                [
                    'text' => 'profile',
                    'route'  => 'perfil.show',
                    'icon' => 'fas fa-fw fa-user',
                ],
        
                [
                    'text' => 'change_password',
                  'route'  =>  'change-password',
                    'icon' => 'fas fa-fw fa-lock',
                ],
            ]
        ],

        [
            'text'       => 'Gestionar Servicio',  //PAQUE GESTIONAR SERVICIO
            'icon'       => 'fas fa-folder',
            'submenu'    => [
                [
                    'text' => 'Clientes',   
                  'route'  =>  'cliente.index',
                    'icon' => 'fas fa-users',
                    'can'   =>  'admin-access'
                    
                ],
                [
                    'text'       => 'Entrenadores',
                    'icon'       => 'fas fa-users',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'Lista de Entrenadores',
                            'icon'       => 'fas fa-list',
                            'route'  => 'empleado.index',
                            'can'   =>  'admin-access'
                        ],
        
                    ]
                ],

                [
                    'text'       => 'Membresias',
                    'icon'       => 'fas fa-id-card-alt',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'Lista de membresias',
                            'icon'       => 'fas fa-list',
                            'route'  => 'membresia.index',
                            'can'   =>  'admin-access'
                        ],
                        [
                            'text' => 'Crear membresia',
                            'icon'       => 'fas fa-list',
                            'route'  => 'membresia.create',
                            'can'   =>  'admin-access'
                        ],
        
                    ]
                ],

                [
                    'text'       => 'Disciplinas',
                    'icon'       => 'fas fa-dumbbell',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'Lista de Disciplinas',
                            'icon'       => 'fas fa-list',
                            'route'  => 'disciplina.index',
                            'can'   =>  'admin-access'
                        ],
                        [
                            'text' => 'Registrar Disciplina',
                            'icon'       => 'fas fa-user-plus',
                            'route'  =>  'disciplina.create',
                            'can'   =>  'admin-access'
                        ],
                    ]
                ],

                [
                    'text'       => 'Horarios Disciplina',
                    'icon'       => 'fas fa-clock',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'Lista de Horarios',
                            'icon'       => 'fas fa-list',
                            'route'  => 'horario_disciplina.index',
                            'can'   =>  'admin-access'
                        ],
                        [
                            'text' => 'crear horario',
                            'icon'       => 'fas fa-list',
                            'route'  => 'horario_disciplina.create',
                            'can'   =>  'admin-access'
                        ],
        
                    ]
                ],
                [
                    'text'       => 'Productos',
                    'icon'       => 'fas fa-dumbbell',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                         [
                             'text' => 'Lista de Productos',
                             'icon'       => 'fas fa-list',
                             'route'  => 'producto.index',
                             'can'   =>  'admin-access',
                         ],
                         [
                             'text' => 'Lista de Categorias',
                             'icon'       => 'fas fa-list-ol',
                             'route'  => 'categoria.index',
                             'can'   =>  'admin-access',
                         ],
                         [
                            'text' => 'Venta de Productos',
                            'icon'       => 'fas fa-list-ol',
                            'route'  => 'form/estimates/page',
                            'can'   =>  'admin-access',
                         ],
                    ]
                ],
                [
                    'text'       => 'Promociones',
                    'icon'       => 'fas fa-id-card-alt',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'Lista de Promociones',
                            'icon'       => 'fas fa-list',
                            'route'  => 'promocion.index',
                            'can'   =>  'admin-access'
                        ],
                        [
                            'text' => 'Crear promocion',
                            'icon'       => 'fas fa-list',
                            'route'  => 'promocion.create',
                            'can'  => 'admin-access'
                        ],
        
                    ]
                ],
                
            ]
        ],


        [
            'text'       => 'Gestionar Venta',  //PAQUE GESTIONAR VENTAS
            'icon'       => 'fas fa-folder',
            'submenu'    => [
                // [
                //     'text' => 'Lista de Disciplinas',
                //     'icon'       => 'fas fa-list',
                //     'route'  => 'disciplina.index'
                // ],
                // [
                //     'text' => 'Registrar Disciplina',
                //     'icon'       => 'fas fa-user-plus',
                //     'route'  =>  'disciplina.create'
                // ],
                [
                    'text'       => 'Historial de pagos',
                    'icon'       => 'fas fa-id-card-alt',
                    'can'   =>  'admin-access',
                    'submenu'    => [
                        [
                            'text' => 'pagos',
                            'icon'       => 'fas fa-list',
                            'route'  => 'pago.index',
                            'can'   =>  'admin-access'
                        ],
        
        
                    ]
                ],
            ]
        ],
        [
            'text'       => 'Bitacora',
            'icon'       => 'fas fa-id-card-alt',
            'can'   =>  'admin-access',
            'submenu'    => [
                [
                    'text' => 'ver Bitacora',
                    'icon'       => 'fas fa-list',
                    'route'  => 'bitacora.index',
                    'can'   =>  'admin-access'
                ],


            ]
        ],






        



        // [
        //     'text'       => 'Sauna',
        //     'icon'       => 'fas fa-hot-tub',
        //     //'can'   =>  'admin-access',
        //     'submenu'    => [
        //         [
        //             'text' => 'Lista de pagos',
        //             'icon'       => 'fas fa-credit-card',
        //             'route'  => 'sauna.index',
        //         //    'can'   =>  'admin-access'
        //         ],
        //         [
        //             'text'  => 'Registrar pago',
        //             'icon'  => 'fas fa-user-plus',
        //            'route'  =>  'sauna.create',
        //        //    'can'   =>  'admin-access'
        //         ],
        //     ]
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'DatatablesPlugins' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
            ],
        ],
        
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'TempusDominusBs4' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
            ],
        ],
        'DateRangePicker' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.css',
                ],
            ],
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
