<?php
return [
    //Date time format
    'date_format' => 'd/m/Y',
    'date_mask' => 'dd/mm/yyyy', //For input mask
    'time_format' => 'H:i:s',
    'date_time_format' => 'd/m/Y H:i:s',

    //Admin
    'admin' => [
        'path' => '/admincp',
        'per_page' => 20,

        //Button CSS, HTML
        'button' => [
            'edit' => [
                'class' => 'btn btn-brand btn-sm',
                'icon' => '<i class="fa fa-edit"></i>'
            ],
            'delete' => [
                'class' => 'btn btn-danger btn-sm',
                'icon' => '<i class="fa fa-trash"></i>',
            ],
            'add' => [
                'class' => 'btn btn-primary btn-sm',
                'icon' => '<i class="fa fa-plus"></i>',
            ],
            'search' => [
                'class' => 'btn btn-info btn-sm',
                'icon' => '<i class="fa fa-search"></i>',
            ],
            'show' => [
                'class' => 'btn btn-success btn-sm',
                'icon' => '<i class="fa fa-eye"></i>',
            ],
            'hide' => [
                'class' => 'btn btn-warning btn-sm',
                'icon' => '<i class="fa fa-eye-slash"></i>',
            ]
        ],

        //Display status CSS
        'display_status' => [
            '0' => [
                'class' => 'label label-default',
                'icon' => '<i class="fa fa-eye-slash"></i>',
            ],
            '1' => [
                'class' => 'label label-success',
                'icon' => '<i class="fa fa-eye"></i>',
            ]
        ],
    ],
];
