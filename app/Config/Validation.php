<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use Myth\Auth\Authentication\Passwords\ValidationRules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
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
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $register = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'email' => [
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'repeatPassword' => [
            'rules' => 'required|matches[password]',
        ],
    ];

    public $register_errors = [
        'username' => [
            'required' => '{field} Harus Diisi',
            'min_length' => '{field} Minimal 5 Karakter',
        ],
        'email' => [
            'required' => '{field} Harus Diisi',
        ],
        'password' => [
            'required' => '{field} Harus Diisi',
        ],
        'repeatPassword' => [
            'required' => '{field} Harus Diisi',
            'matches' => '{field} Tidak Match Dengan Password'
        ],
    ];

    public $login = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'password' => [
            'rules' => 'required',
        ],
    ];

    public $login_errors = [
        'username' => [
            'required' => '{field} Harus Diisi',
            'min_length' => '{field} Minimal 5 Karakter',
        ],
        'password' => [
            'required' => '{field} Harus Diisi',
        ],
    ];

    public $banner = [
        'nama' => [
            'rules' => 'required',
        ],
        'harga' => [
            'rules' => 'required|is_natural',
        ],
        'stok' => [
            'rules' => 'required|is_natural',
        ],
        'gambar' => [
            'rules' => 'uploaded[gambar]',
        ],
        'lama_tour' => [
            'rules' => 'required|is_natural',
        ],
        'deskripsi' => [
            'rules' => 'required',
        ],
        'id_kategori' => [
            'rules' => 'required',
        ]

    ];

    public $banner_errors = [
        'nama' => [
            'required' => '{field} Harus diisi',

        ],
        'harga' => [
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak Boleh Negatif',
        ],
        'stok' => [
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak Boleh Negatif',
        ],
        'gambar' => [
            'uploaded' => '{field} Harus di upload',
        ],
        'lama_tour' => [
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak Boleh Negatif',
        ],
        'deskripsi' => [
            'required' => '{field} Harus diisi',
        ],
        'id_kategori' => [
            'required' => '{field} Harus diisi',
        ]

    ];
}
