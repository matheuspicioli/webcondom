<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'WebCondom',

    'title_prefix' => '',

    'title_postfix' => '',


    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Web</b>Condom',

    'logo_mini' => '<b>W</b>C',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => 'fixed',

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    | icones:  https://adminlte.io/themes/AdminLTE/pages/UI/icons.html
    */

    'menu' => [
        [
        'text'    => 'Cadastros',
        'icon'    => 'list-alt',
        'submenu' => [
        [
            'text'    => 'Condomínios',
            'icon'    => 'building-o',
            'submenu' =>
            [
                [
                'text'  => 'Condominios',
                'url'   => 'Condominios/Condominios',
                'icon'  => 'building-o',
                'can'   => 'listar_condominio',
                ],
                [
                'text'  => 'Síndicos',
                'url'   => 'Condominios/Sindicos',
                'icon'  => 'user',
                'can'   => 'listar_sindico',
                ],
                [
                'text'  => 'Imóveis',
                'url'   => 'Condominios/Imoveis',
                'icon'  => 'home',
                'can'   => 'listar_imovel',
                ]
            ],
        ],
        [
            'text'    => 'Entidades',
            'icon'    => 'users',
            'submenu' =>
            [
                [
                'text'  => 'Empresas',
                'url'   => 'Entidades/Empresas',
                'icon'  => 'building',
                'can'   => 'listar_empresa',
                ],
                [
                'text'  => 'Fornecedores',
                'url'   => 'Entidades/Fornecedores',
                'icon'  => 'building',
                'can'   => 'listar_fornecedor',
                ],
                [
                'text'  => 'Funcionarios',
                'url'   => 'Entidades/Funcionarios',
                'icon'  => 'user',
                'can'   => 'listar_funcionario',
                ],
                [
                'text'  => 'Proprietários',
                'url'   => 'Entidades/Proprietarios',
                'icon'  => 'user',
                'can'   => 'listar_proprietario',
                ],
                [
                'text'  => 'Inquilinos',
                'url'   => 'Entidades/Inquilinos',
                'icon'  => 'user',
                'can'   => 'listar_inquilino',
                ]

            ]
        ],
        [
            'text'    => 'Financeiro',
            'icon'    => 'dollar',
            'submenu' =>
                [
                    [
                        'text'  => 'Grupo de Contas',
                        'url'   => 'Financeiros/GrupoDeContas',
                        'icon'  => 'circle-o',
                        'can'   => 'listar_grupodeconta',
                    ],
                    [
                        'text'  => 'Plano de Contas',
                        'url'   => 'Financeiros/GrupoDeContas',
                        'icon'  => 'circle-o',
                        'can'   => 'listar_grupodeconta',
                    ],
                    [
                        'text'  => 'Bancos',
                        'url'   => 'Financeiros/Bancos',
                        'icon'  => 'bank',
                        'can'   => 'listar_banco'
                    ],
                    [
                        'text'  => 'Conta Corrente',
                        'url'   => 'Financeiros/ContasCorrente',
                        'icon'  => 'cc',
                        'can'   => 'listar_contacorrente',
                    ],

                ]
        ],
        [
            'text'    => 'Diversos',
            'icon'    => 'object-ungroup',
            'submenu' =>
                [
                    [
                        'text'  => 'Categorias',
                        'url'   => 'Diversos/Categorias',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_categoria',
                    ],
                    [
                        'text'  => 'Departamentos',
                        'url'   => 'Diversos/Departamentos',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_departamento',
                    ],
                    [
                        'text'  => 'Estado Civil',
                        'url'   => 'Diversos/EstadoCivil',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_estadocivil',
                    ],
                    [
                        'text'  => 'Regime de Casamento',
                        'url'   => 'Diversos/RegimesCasamentos',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_regimecasamento',
                    ],
                    [
                        'text'  => 'Setores',
                        'url'   => 'Diversos/Setores',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_setor',
                    ],
                    [
                        'text'  => 'Tipos de Imóveis',
                        'url'   => 'Diversos/TiposImoveis',
                        'icon'  => 'dot-circle-o',
                        'can'   => 'listar_tipoimovel',
                    ],
                ]
        ]
        ]
    ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
    ],
];
