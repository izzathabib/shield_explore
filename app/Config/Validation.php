<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $registration = [
        'comp_reg_no' => [
            'label' => 'Company Registration No',
            'rules' => [
                'required',
                'is_unique[users.comp_reg_no]',
                'max_length[30]',
                'min_length[3]',
            ],
            'errors' => [
                'is_unique' => 'Your company already have an account registered for this system'
            ]
        ],
        'comp_name' => [
            'label' => 'Company Name',
            'rules' => [
                'required',
                'min_length[3]',
                'max_length[255]',
            ],
        ],
        'username' => [
            'label' => 'Auth.username',
            'rules' => [
                'required',
                'max_length[30]',
                'min_length[3]',
                'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
                'is_unique[users.username]',
            ],
        ],
        'email' => [
            'label' => 'Auth.email',
            'rules' => [
                'required',
                'max_length[254]',
                'valid_email',
                'is_unique[auth_identities.secret]',
            ],
        ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => 'required|max_byte[72]|strong_password[]',
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes'
            ]
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];
}
