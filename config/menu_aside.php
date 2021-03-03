<?php
// Aside menu
return [
    "member_menu" => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/member',
            'new-tab' => false,
        ],
        // // Domain Utama
        // [
        //     'section' => 'Assessmen',
        // ],
        // // Pendaftaran
        // [
        //     'title' => 'Pendaftaran Uji',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
        //     'page' => '/',
        //     'new-tab' => false,
        // ],
        // // Pendaftaran
        // [
        //     'title' => 'Pra Assessmen',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
        //     'page' => '/',
        //     'new-tab' => false,
        // ],
        // Domain Utama
        [
            'section' => 'Pengaturan',
        ],
        // Profil
        [
            'title' => 'Profil',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/member/pengaturan/profil',
            'new-tab' => false,
        ],
        // Profil
        [
            'title' => 'Akun',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/member/pengaturan/profil',
            'new-tab' => false,
        ],
    ],
    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        // Domain Utama
        [
            'section' => 'Sistem Informasi',
        ],
        [
            'title' => 'SI Sertifikasi',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            "root"=>true,
            "submenu"=> [
                [
                    'title' => 'Modul Perencanaan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line',
                ],
                [
                    'title' => 'Modul Aplikasi',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line',
                    'page' => './manager/sertifikasi/aplikasi'
                ],
                [
                    'title' => 'Modul Asesmen',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Ujian',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Keputusan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Banding',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Sanksi',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Resertifikasi',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Logo',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Keluhan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ]
            ]
        ],
        [
            'title' => 'SI Manajemen',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            "root"=>true,
            "submenu"=> [
                [
                    'title' => 'Modul Pelaporan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Portal',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
            ]
        ],
        [
            'title' => 'SI Administrasi',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            "root"=>true,
            "submenu"=> [
                [
                    'title' => 'Administrasi Umum',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    "root"=>true,
                    "submenu"=>[
                        [
                            'title' => 'Jurnal Surat',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title' => 'Surat Masuk',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title' => 'Surat Keluar',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title' => 'Surat Keputusan',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title' => 'SOP',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                    ]
                ],
                [
                    'title' => 'Modul SDM',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Keuangan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul Asesor',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
                [
                    'title' => 'Modul TUK',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line',
                    'page' => '/manager/administrasi/mg-tuk'
                ],
                
                [
                    'title' => 'Modul Skema',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line',
                    "submenu"=>[
                        [
                            'title' => 'MUK',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title' => 'Skema',
                            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet' => 'line'
                        ],
                        [
                            'title'     => 'Unit Kompetensi',
                            'icon'      => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                            'bullet'    => 'line',
                            'page'      =>  'manager/administrasi/mskema/mg-unit'
                        ],
                    ]
                ],
                [
                    'title' => 'Modul Pengetahuan',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'line'
                ],
            ]
        ],
        [
            'title' => 'Unit Kearsipan',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Taksonomi',
                    'page' => 'test',
                ],
                [
                    'title' => 'Arsip Dinamis',
                    'page' => 'test',
                ],
                [
                    'title' => 'Arsip Statis',
                    'page' => 'test',
                ],
                [
                    'title' => 'Jadwal Retensi',
                    'page' => 'test',
                ],
                [
                    'title' => 'Penyimpanan Arsip',
                    'page' => 'test',
                ],
            ]
        ],
        // Pengaturan
        [
            'section' => 'Pengaturan',
        ],
        [
            'title' => 'Master Permissions',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Permissions',
                    'page' => './manager/pengaturan/permission',
                ],
                [
                    'title' => 'Role',
                    'page' => './manager/pengaturan/role',
                ]
            ]
        ],
        [
            'title' => 'Sekolah & Jejaring',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Sekolah',
                    'page' => './manager/pengaturan/sekolahjejaring/sekolah',
                ],
                [
                    'title' => 'Admin Jejaring',
                    'page' => './manager/pengaturan/sekolahjejaring/manajer',
                ],
            ]
        ],
        [
            'title' => 'User Management',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Manager',
                    'page' => './manager/pengaturan/member/manager',
                ],
                [
                    'title' => 'Asesor',
                    'page' => './manager/pengaturan/member/asesor',
                ],
                [
                    'title' => 'Asesi',
                    'page' => './manager/pengaturan/member/asesi',
                ]
            ]
        ],
        [
            'title' => 'Backup & Restore',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
        ],
        [
            'title' => 'System Health',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
        ],
        [
            'title' => 'Log & Audit',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'User Login',
                    'page' => 'test',
                ],
                [
                    'title' => 'Assessment',
                    'page' => 'test',
                ],
                [
                    'title' => 'Cek Sertifikat',
                    'page' => 'test',
                ],
                [
                    'title' => 'Page Visit',
                    'page' => 'test',
                ]
            ]
        ],   
        // Icons
        [
            'section' => 'Icons',
        ],
        [
            'title' => 'Icons Lib',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Custom',
                    'bullet' => 'dot',
                    'page'=>'/icons/custom-icons'
                ],
                [
                    'title' => 'Flaticon',
                    'bullet' => 'dot',
                    'page'=>'/icons/flaticon'
                ],
                [
                    'title' => 'Fontawesome',
                    'bullet' => 'dot',
                    'page'=>'/icons/fontawesome'
                ],
                [
                    'title' => 'Line Awesome',
                    'bullet' => 'dot',
                    'page'=>'/icons/lineawesome'
                ],
                [
                    'title' => 'Socicon',
                    'bullet' => 'dot',
                    'page'=>'/icons/socicons'
                ],
                [
                    'title' => 'SVG',
                    'bullet' => 'dot',
                    'page'=>'/icons/svg'
                ],
            ]
        ]
    ]

];
