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

    'title' => 'Wine Cup',
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
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Wine</b>Cup',
    'logo_img' => '', //vendor/adminlte/dist/img/AdminLTELogo.png
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '', //AdminLTE

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

    'usermenu_enabled' => true,
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
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

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
    'classes_auth_footer' => '',
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
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
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

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
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
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

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
            // 'text'         => 'search',
            // 'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],
        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],
        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],
        ['header' => ''],
        
        [
            'text'    => 'Admin Usuarios',
            'icon'    => 'fas fa-user-cog',
            'can'     => 'admin.users.index',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'route'  => 'admin.users.index',
                    'icon' => 'fas fa-fw fa-users',
                    'can'     => 'admin.users.index',
                ],
                [
                    'text' => 'Roles',
                    'icon' => 'fas fa-fw fa-users-cog',
                    'can'     => 'admin.roles.index',
                    'submenu' =>
                    [
                        [
                            'text' => 'Roles',
                            'route'  => 'admin.roles.index',
                            'icon' => 'fas fa-list',
                            'icon_color' => 'blue',
                            'can'     => 'admin.roles.index',
                        ],
                        [
                            'text' => 'Crear Rol',
                            'route'  => 'admin.roles.create',
                            'icon' => 'fas fa-plus',
                            'icon_color' => 'green',
                            'can'     => 'admin.roles.create',
                        ],
                    ],
                ],
                [
                    'text' => 'Permisos',
                    'icon' => 'fas fa-fw fa-key',
                    'can'     => 'admin.permissions.index',
                    'submenu' =>
                    [
                        [
                            'text' => 'Permisos',
                            'route'  => 'admin.permissions.index',
                            'icon' => 'fas fa-list',
                            'icon_color' => 'blue',
                            'can'     => 'admin.permissions.index',
                        ],
                        [
                            'text' => 'Crear Permiso',
                            'route'  => 'admin.permissions.create',
                            'icon' => 'fas fa-plus',
                            'icon_color' => 'green',
                            'can'     => 'admin.permissions.create',
                        ],
                    ],
                ],
            ],
        ],
        [
            'text' => 'Ordenes de compra',
            'icon' => 'fas fa-cart-arrow-down text-lg',
            'route'  => 'admin.orders.index',
            // 'can'     => 'admin.orders.index',
        ],
        [
            'text' => 'Productos',
            'icon' => 'fas fa-box',
            // 'can'     => 'admin.products.index',
            'submenu' =>
            [
                [
                    'text' => 'Listado Productos',
                    'route'  => 'admin.products.index',
                    'icon' => 'fas fa-list',
                    'icon_color' => 'blue',
                    // 'can'     => 'admin.products.index',
                ],
                [
                    'text' => 'Crear Producto',
                    'route'  => 'admin.products.create',
                    'icon' => 'fas fa-plus',
                    'icon_color' => 'green',
                    // 'can'     => 'admin.products.create',
                ],
            ],
        ],
        [
            'text' => 'Subcategorías',
            'icon' => 'fas fa-tags',
            // 'can'     => 'admin.subcategories.index',
            'submenu' =>
            [
                [
                    'text' => 'Listado Subcategorías',
                    'route'  => 'admin.subcategories.index',
                    'icon' => 'fas fa-list',
                    'icon_color' => 'blue',
                    // 'can'     => 'admin.subcategories.index',
                ],
                [
                    'text' => 'Crear Subcategoría',
                    'route'  => 'admin.subcategories.create',
                    'icon' => 'fas fa-plus',
                    'icon_color' => 'green',
                    // 'can'     => 'admin.subcategories.create',
                ],
            ],
        ],
        [
            'text' => 'Categorías',
            'icon' => 'fas fa-tags',
            // 'can'     => 'admin.categories.index',
            'submenu' =>
            [
                [
                    'text' => 'Listado Categorias',
                    'route'  => 'admin.categories.index',
                    'icon' => 'fas fa-list',
                    'icon_color' => 'blue',
                    // 'can'     => 'admin.categories.index',
                ],
                [
                    'text' => 'Crear Categoría',
                    'route'  => 'admin.categories.create',
                    'icon' => 'fas fa-plus',
                    'icon_color' => 'green',
                    // 'can'     => 'admin.categories.create',
                ],
            ],
        ],
        [
            'text' => 'Proveedores',
            'icon' => 'fas fa-truck-moving',
            // 'can'     => 'admin.subcategories.index',
            'submenu' =>
            [
                [
                    'text' => 'Listado Proveedores',
                    'route'  => 'admin.suppliers.index',
                    'icon' => 'fas fa-list',
                    'icon_color' => 'blue',
                    // 'can'     => 'admin.subcategories.index',
                ],
                [
                    'text' => 'Crear Proveedor',
                    'route'  => 'admin.suppliers.create',
                    'icon' => 'fas fa-plus',
                    'icon_color' => 'green',
                    // 'can'     => 'admin.subcategories.create',
                ],
            ],
        ],
        [
            'text' => 'Recepción mercadería',
            'icon' => 'fas fa-people-carry',
            // 'can'     => 'admin.subcategories.index',
            'submenu' =>
            [
                [
                    'text' => 'Listado de ingresos',
                    'route'  => 'admin.receptiongoods.index',
                    'icon' => 'fas fa-list',
                    'icon_color' => 'blue',
                    // 'can'     => 'admin.subcategories.index',
                ],
                [
                    'text' => 'Recepción de mercadería',
                    'route'  => 'admin.receptiongoods.create',
                    'icon' => 'fas fa-plus',
                    'icon_color' => 'green',
                    // 'can'     => 'admin.subcategories.create',
                ],
            ],
        ],
        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
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
        // 'livewire' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => true,
        //             'location' => 'js/app.js',
        //         ],
        //         [
        //             'type' => 'css',
        //             'asset' => true,
        //             'location' => 'css/app.css',
        //         ],
        //     ],
        // ],
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
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
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
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
        'DropZone' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js',
                ],
            ],
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
    */

    'livewire' => true,
];