<?php

namespace App\Main;


class SidebarPanel
{
    public static function elements()
    {
        return [
            'title' => 'Elements',
            'items' => [
                [
                    'elements_avatar' => [
                        'title' => 'Avatar',
                        'route_name' => 'elements/avatar'
                    ],
                    'elements_alert' => [
                        'title' => 'Alert',
                        'route_name' => 'elements/alert'
                    ],
                    'elements_button' => [
                        'title' => 'Button',
                        'route_name' => 'elements/button'
                    ],
                    'elements_button_group' => [
                        'title' => 'Button Group',
                        'route_name' => 'elements/button-group'
                    ],
                    'elements_badge' => [
                        'title' => 'Badge',
                        'route_name' => 'elements/badge'
                    ],
                    'elements_breadcrumb' => [
                        'title' => 'Breadcrumb',
                        'route_name' => 'elements/breadcrumb'
                    ],
                    'elements_card' => [
                        'title' => 'Card',
                        'route_name' => 'elements/card'
                    ],
                    'elements_divider' => [
                        'title' => 'Divider',
                        'route_name' => 'elements/divider'
                    ],
                    'elements_mask' => [
                        'title' => 'Mask',
                        'route_name' => 'elements/mask'
                    ],
                    'elements_progress' => [
                        'title' => 'Progress',
                        'route_name' => 'elements/progress'
                    ],
                    'elements_skeleton' => [
                        'title' => 'Skeleton',
                        'route_name' => 'elements/skeleton'
                    ],
                    'elements_spinner' => [
                        'title' => 'Spinner',
                        'route_name' => 'elements/spinner'
                    ],
                    'elements_tag' => [
                        'title' => 'Tag',
                        'route_name' => 'elements/tag'
                    ],
                    'elements_tooltip' => [
                        'title' => 'Tooltip',
                        'route_name' => 'elements/tooltip'
                    ],
                ],
                [
                    'elements_forms' => [
                        'title' => 'Forms',
                        'route_name' => 'forms/input-text'
                    ],
                    'elements_typography' => [
                        'title' => 'Typography',
                        'route_name' => 'elements/typography'
                    ],
                ]
            ]
        ];
    }

    public static function components()
    {
        return [
            'title' => 'Components',
            'items' => [
                [
                    'components_accordion' => [
                        'title' => 'Accordion',
                        'route_name' => 'components/accordion'
                    ],
                    'components_collapse' => [
                        'title' => 'Collapse',
                        'route_name' => 'components/collapse'
                    ],
                    'components_tab' => [
                        'title' => 'Tab',
                        'route_name' => 'components/tab'
                    ],
                    'components_dropdown' => [
                        'title' => 'Dropdown',
                        'route_name' => 'components/dropdown'
                    ],
                    'components_popover' => [
                        'title' => 'Popover',
                        'route_name' => 'components/popover'
                    ],
                    'components_modal' => [
                        'title' => 'Modal',
                        'route_name' => 'components/modal'
                    ],
                    'components_drawer' => [
                        'title' => 'Drawer',
                        'route_name' => 'components/drawer'
                    ],
                    'components_steps' => [
                        'title' => 'Steps',
                        'route_name' => 'components/steps'
                    ],
                    'components_timeline' => [
                        'title' => 'Timeline',
                        'route_name' => 'components/timeline'
                    ],
                    'components_pagination' => [
                        'title' => 'Pagination',
                        'route_name' => 'components/pagination'
                    ],
                    'components_menu_list' => [
                        'title' => 'Menu List',
                        'route_name' => 'components/menu-list'
                    ],
                    'components_treeview' => [
                        'title' => 'Treeview',
                        'route_name' => 'components/treeview'
                    ],

                ],
                [
                    'components_table' => [
                        'title' => 'Table',
                        'route_name' => 'components/table'
                    ],

                    'components_table_advanced' => [
                        'title' => 'Table Advanced',
                        'route_name' => 'components/table-advanced'
                    ],

                    'components_table_gridjs' => [
                        'title' => 'Table Gridjs',
                        'route_name' => 'components/gridjs'
                    ],
                ],
                [
                    'components_apexchart' => [
                        'title' => 'Apexcharts',
                        'route_name' => 'components/apexchart'
                    ],

                    'components_carousel' => [
                        'title' => 'Carousel',
                        'route_name' => 'components/carousel'
                    ],

                    'components_notification' => [
                        'title' => 'Notification',
                        'route_name' => 'components/notification'
                    ],
                ],
                [
                    'components_extension_clipboard' => [
                        'title' => 'Clipboard',
                        'route_name' => 'components/extension-clipboard'
                    ],
                    'components_extension_persist' => [
                        'title' => 'Persist',
                        'route_name' => 'components/extension-persist'
                    ],
                    'components_extension_monochrome' => [
                        'title' => 'Monochrome Mode',
                        'route_name' => 'components/extension-monochrome'
                    ],
                ],
            ]
        ];
    }

    public static function forms()
    {
        return [
            'title' => 'Forms',
            'items' => [
                [
                    'forms_layout_v1' => [
                        'title' => 'Form Layout v1',
                        'route_name' => 'forms/layout-v1'
                    ],
                    'forms_layout_v2' => [
                        'title' => 'Form Layout v2',
                        'route_name' => 'forms/layout-v2'
                    ],
                    'forms_layout_v3' => [
                        'title' => 'Form Layout v3',
                        'route_name' => 'forms/layout-v3'
                    ],
                    'forms_layout_v4' => [
                        'title' => 'Form Layout v4',
                        'route_name' => 'forms/layout-v4'
                    ],
                    'forms_layout_v5' => [
                        'title' => 'Form Layout v5',
                        'route_name' => 'forms/layout-v5'
                    ],
                ],
                [
                    'forms_input_text' => [
                        'title' => 'Input text',
                        'route_name' => 'forms/input-text'
                    ],
                    'forms_input_group' => [
                        'title' => 'Input group',
                        'route_name' => 'forms/input-group'
                    ],
                    'forms_input_mask' => [
                        'title' => 'Input mask',
                        'route_name' => 'forms/input-mask'
                    ],
                    'forms_checkbox' => [
                        'title' => 'Checkbox',
                        'route_name' => 'forms/checkbox'
                    ],
                    'forms_radio' => [
                        'title' => 'Radio',
                        'route_name' => 'forms/radio'
                    ],
                    'forms_switch' => [
                        'title' => 'Switch',
                        'route_name' => 'forms/switch'
                    ],
                    'forms_select' => [
                        'title' => 'Select',
                        'route_name' => 'forms/select'
                    ],
                    'forms_tom_select' => [
                        'title' => 'Tom select',
                        'route_name' => 'forms/tom-select'
                    ],
                    'forms_textarea' => [
                        'title' => 'Textarea',
                        'route_name' => 'forms/textarea'
                    ],
                    'forms_range' => [
                        'title' => 'Range',
                        'route_name' => 'forms/range'
                    ],
                    'forms_datepicker' => [
                        'title' => 'Datepicker',
                        'route_name' => 'forms/datepicker'
                    ],
                    'forms_timepicker' => [
                        'title' => 'Timepicker',
                        'route_name' => 'forms/timepicker'
                    ],
                    'forms_datetimepicker' => [
                        'title' => 'Datetimepicker',
                        'route_name' => 'forms/datetimepicker'
                    ],
                    'forms_text_editor' => [
                        'title' => 'Text editor',
                        'route_name' => 'forms/text-editor'
                    ],
                    'forms_upload' => [
                        'title' => 'Form upload',
                        'route_name' => 'forms/upload'
                    ],
                    'forms_validation' => [
                        'title' => 'Form Validation',
                        'route_name' => 'forms/validation'
                    ],
                ]
            ]
        ];
    }

    public static function layouts()
    {
        return [
            'title' => 'Layouts',
            'items' => [
                [
                    'layouts_onboarding' => [
                        'title' => 'Onboarding',
                        'submenu' => [
                            'layouts_onboarding_1' => [
                                'title' => 'Onboarding 1',
                                'route_name' => 'layouts/onboarding-1'
                            ],
                            'layouts_onboarding_2' => [
                                'title' => 'Onboarding 2',
                                'route_name' => 'layouts/onboarding-2'
                            ]
                        ]
                    ],
                    'layouts_user_card' => [
                        'title' => 'User Card',
                        'submenu' => [
                            'layouts_user_card_1' => [
                                'title' => 'User Card 1',
                                'route_name' => 'layouts/user-card-1'
                            ],
                            'layouts_user_card_2' => [
                                'title' => 'User Card 2',
                                'route_name' => 'layouts/user-card-2'
                            ],
                            'layouts_user_card_3' => [
                                'title' => 'User Card 3',
                                'route_name' => 'layouts/user-card-3'
                            ],
                            'layouts_user_card_4' => [
                                'title' => 'User Card 4',
                                'route_name' => 'layouts/user-card-4'
                            ],
                            'layouts_user_card_5' => [
                                'title' => 'User Card 5',
                                'route_name' => 'layouts/user-card-5'
                            ],
                            'layouts_user_card_6' => [
                                'title' => 'User Card 6',
                                'route_name' => 'layouts/user-card-6'
                            ],
                            'layouts_user_card_7' => [
                                'title' => 'User Card 7',
                                'route_name' => 'layouts/user-card-7'
                            ],
                        ]
                    ],
                    'layouts_blog_card' => [
                        'title' => 'Blog Card',
                        'submenu' => [
                            'layouts_blog_card_1' => [
                                'title' => 'Blog Card 1',
                                'route_name' => 'layouts/blog-card-1'
                            ],
                            'layouts_blog_card_2' => [
                                'title' => 'Blog Card 2',
                                'route_name' => 'layouts/blog-card-2'
                            ],
                            'layouts_blog_card_3' => [
                                'title' => 'Blog Card 3',
                                'route_name' => 'layouts/blog-card-3'
                            ],
                            'layouts_blog_card_4' => [
                                'title' => 'Blog Card 4',
                                'route_name' => 'layouts/blog-card-4'
                            ],
                            'layouts_blog_card_5' => [
                                'title' => 'Blog Card 5',
                                'route_name' => 'layouts/blog-card-5'
                            ],
                            'layouts_blog_card_6' => [
                                'title' => 'Blog Card 6',
                                'route_name' => 'layouts/blog-card-6'
                            ],
                            'layouts_blog_card_7' => [
                                'title' => 'Blog Card 7',
                                'route_name' => 'layouts/blog-card-7'
                            ],
                            'layouts_blog_card_8' => [
                                'title' => 'Blog Card 8',
                                'route_name' => 'layouts/blog-card-8'
                            ],
                            'layouts_blog_details' => [
                                'title' => 'Blog Details',
                                'route_name' => 'layouts/blog-details'
                            ],
                        ]
                    ],
                    'layouts_help' => [
                        'title' => 'Help',
                        'submenu' => [
                            'layouts_help_1' => [
                                'title' => 'Help 1',
                                'route_name' => 'layouts/help-1'
                            ],
                            'layouts_help_2' => [
                                'title' => 'Help 2',
                                'route_name' => 'layouts/help-2'
                            ],
                            'layouts_help_3' => [
                                'title' => 'Help 3',
                                'route_name' => 'layouts/help-3'
                            ]
                        ]
                    ],
                    'layouts_price_list' => [
                        'title' => 'Price List',
                        'submenu' => [
                            'layouts_price_list_1' => [
                                'title' => 'Price List 1',
                                'route_name' => 'layouts/price-list-1'
                            ],
                            'layouts_price_list_2' => [
                                'title' => 'Price List 2',
                                'route_name' => 'layouts/price-list-2'
                            ],
                            'layouts_price_list_3' => [
                                'title' => 'Price List 3',
                                'route_name' => 'layouts/price-list-3'
                            ],
                            'layouts_price_list_4' => [
                                'title' => 'Price List 4',
                                'route_name' => 'layouts/price-list-4'
                            ]
                        ]
                    ],
                    'layouts_invoice' => [
                        'title' => 'Invoice',
                        'submenu' => [
                            'layouts_invoice_1' => [
                                'title' => 'Invoice 1',
                                'route_name' => 'layouts/invoice-1'
                            ],
                            'layouts_invoice_2' => [
                                'title' => 'Invoice 2',
                                'route_name' => 'layouts/invoice-2'
                            ]
                        ]
                    ],
                ],
                [
                    'layouts_sign_in' => [
                        'title' => 'Sign In',
                        'submenu' => [
                            'layouts_invoice_1' => [
                                'title' => 'Sign In 1',
                                'route_name' => 'layouts/sign-in-1'
                            ],
                            'layouts_invoice_2' => [
                                'title' => 'Sign In 2',
                                'route_name' => 'layouts/sign-in-2'
                            ]
                        ]
                    ],
                    'layouts_sign_up' => [
                        'title' => 'Sign Up',
                        'submenu' => [
                            'layouts_sign_up_1' => [
                                'title' => 'Sign Up 1',
                                'route_name' => 'layouts/sign-up-1'
                            ],
                            'layouts_sign_up_2' => [
                                'title' => 'Sign Up 2',
                                'route_name' => 'layouts/sign-up-2'
                            ]
                        ]
                    ],
                ],
                [
                    'layouts_error' => [
                        'title' => 'Error',
                        'submenu' => [
                            'layouts_error_404_1' => [
                                'title' => 'Error 404 v1',
                                'route_name' => 'layouts/error-404-1'
                            ],
                            'layouts_error_404_2' => [
                                'title' => 'Error 404 v2',
                                'route_name' => 'layouts/error-404-2'
                            ],
                            'layouts_error_404_3' => [
                                'title' => 'Error 404 v3',
                                'route_name' => 'layouts/error-404-3'
                            ],
                            'layouts_error_404_4' => [
                                'title' => 'Error 404 v4',
                                'route_name' => 'layouts/error-404-4'
                            ],
                            'layouts_error_401' => [
                                'title' => 'Error 401',
                                'route_name' => 'layouts/error-401'
                            ],
                            'layouts_error_429' => [
                                'title' => 'Error 429',
                                'route_name' => 'layouts/error-429'
                            ],
                            'layouts_error_500' => [
                                'title' => 'Error 500',
                                'route_name' => 'layouts/error-500'
                            ],
                        ]
                    ],
                    'layouts_starter' => [
                        'title' => 'Starter',
                        'submenu' => [
                            'layouts_starter_blurred_header' => [
                                'title' => 'Blurred Header',
                                'route_name' => 'layouts/starter-blurred-header'
                            ],
                            'layouts_starter_unblurred_header' => [
                                'title' => 'Unblurred Header',
                                'route_name' => 'layouts/starter-unblurred-header'
                            ],
                            'layouts_starter_centered_link' => [
                                'title' => 'Centered Links',
                                'route_name' => 'layouts/starter-centered-link'
                            ],
                            'layouts_starter_minimal_sidebar' => [
                                'title' => 'Minimal Sidebar',
                                'route_name' => 'layouts/starter-minimal-sidebar'
                            ],
                            'layouts_starter_sideblock' => [
                                'title' => 'Sideblock',
                                'route_name' => 'layouts/starter-sideblock'
                            ],
                        ]
                    ],
                ],
            ]
        ];
    }

    public static function apps()
    {
        return [
            'title' => 'Applications',
            'items' => [
                [
                    'apps_chat' => [
                        'title' => 'Chat App',
                        'route_name' => 'apps/chat'
                    ],
                    'apps_ai_chat' => [
                        'title' => 'Ai Chat App',
                        'route_name' => 'apps/ai-chat'
                    ],
                    'apps_kanban' => [
                        'title' => 'Kanban Board',
                        'route_name' => 'apps/kanban'
                    ],
                    'apps_filemanager' => [
                        'title' => 'File Manager',
                        'route_name' => 'apps/filemanager'
                    ],
                    'apps_mail' => [
                        'title' => 'Mail App',
                        'route_name' => 'apps/mail'
                    ],
                    'apps_todo' => [
                        'title' => 'Todo App',
                        'route_name' => 'apps/todo'
                    ],
                ],
                [
                    'apps_nft_1' => [
                        'title' => 'NFT Apps v1',
                        'route_name' => 'apps/nft1'
                    ],
                    'apps_nft_2' => [
                        'title' => 'NFT Apps v2',
                        'route_name' => 'apps/nft2'
                    ],
                    'apps_pos' => [
                        'title' => 'POS System',
                        'route_name' => 'apps/pos'
                    ],
                    'apps_jobs_board' => [
                        'title' => 'Jobs Board',
                        'route_name' => 'apps/jobs-board'
                    ],
                    'apps_travel' => [
                        'title' => 'Travel App',
                        'route_name' => 'apps/travel'
                    ]
                ],
            ]
        ];
    }

    public static function dashboards()
    {
        return [
            'title' => 'Dashboards',
            'items' => [
                [
                    'dashboards_crm_analytics' => [
                        'title' => 'CRM Analytics',
                        'route_name' => 'dashboards/crm-analytics'
                    ],
                    'dashboards_orders' => [
                        'title' => 'Orders',
                        'route_name' => 'dashboards/orders'
                    ],
                ],
                [
                    'dashboards_crypto' => [
                        'title' => 'Cryptocurrency',
                        'submenu' => [
                            'dashboards_crypto_1' => [
                                'title' => 'Cryptocurrency v1',
                                'route_name' => 'dashboards/crypto-1'
                            ],
                            'dashboards_crypto_2' => [
                                'title' => 'Cryptocurrency v2',
                                'route_name' => 'dashboards/crypto-2'
                            ]
                        ]
                    ],
                    'dashboards_banking' => [
                        'title' => 'Banking',
                        'submenu' => [
                            'dashboards_banking_1' => [
                                'title' => 'Banking v1',
                                'route_name' => 'dashboards/banking-1'
                            ],
                            'dashboards_banking_2' => [
                                'title' => 'Banking v2',
                                'route_name' => 'dashboards/banking-2'
                            ]
                        ]
                    ],
                    'dashboards_personal' => [
                        'title' => 'Personal',
                        'route_name' => 'dashboards/personal'
                    ],
                    'dashboards_cms_analytics' => [
                        'title' => 'CMS Analytics',
                        'route_name' => 'dashboards/cms-analytics'
                    ],
                    'dashboards_influencer' => [
                        'title' => 'Influencer',
                        'route_name' => 'dashboards/influencer'
                    ],
                    'dashboards_travel' => [
                        'title' => 'Travel',
                        'route_name' => 'dashboards/travel'
                    ],
                    'dashboards_teacher' => [
                        'title' => 'Teacher',
                        'route_name' => 'dashboards/teacher'
                    ],
                    'dashboards_education' => [
                        'title' => 'Education',
                        'route_name' => 'dashboards/education'
                    ],
                    'dashboards_authors' => [
                        'title' => 'Authors',
                        'route_name' => 'dashboards/authors'
                    ],
                    'dashboards_doctor' => [
                        'title' => 'Doctor',
                        'route_name' => 'dashboards/doctor'
                    ],
                    'dashboards_employees' => [
                        'title' => 'Employees',
                        'route_name' => 'dashboards/employees'
                    ],
                    'dashboards_workspaces' => [
                        'title' => 'Workspaces',
                        'route_name' => 'dashboards/workspaces'
                    ],
                    'dashboards_meetings' => [
                        'title' => 'Meetings',
                        'route_name' => 'dashboards/meetings'
                    ],
                    'dashboards_project_boards' => [
                        'title' => 'Project Boards',
                        'route_name' => 'dashboards/project-boards'
                    ],
                ],
                [
                    'dashboards_widget_ui' => [
                        'title' => 'Widget UI',
                        'route_name' => 'dashboards/widget-ui'
                    ],
                    'dashboards_widget_contacts' => [
                        'title' => 'Widget Contacts',
                        'route_name' => 'dashboards/widget-contacts'
                    ],
                ],
            ]
        ];
    }

    public static function all(){
        return [self::dashboards(),self::apps(), self::layouts(), self::forms(), self::components(), self::elements()];
    }
}
