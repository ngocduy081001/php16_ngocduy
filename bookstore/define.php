<?php

// ====================== PATHS ===========================
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__));                        // Định nghĩa đường dẫn đến thư mục gốc
define('LIBRARY_PATH', ROOT_PATH . DS . 'libs' . DS);            // Định nghĩa đường dẫn đến thư mục thư viện
define('PUBLIC_PATH', ROOT_PATH . DS . 'public' . DS);            // Định nghĩa đường dẫn đến thư mục public							
define('APPLICATION_PATH', ROOT_PATH . DS . 'application' . DS);        // Định nghĩa đường dẫn đến thư mục public							
define('TEMPLATE_PATH', PUBLIC_PATH . 'template' . DS);        // Định nghĩa đường dẫn đến thư mục public							

define('ROOT_URL', DS . 'PHP16/bookstore' . DS);
define('APPLICATION_URL', ROOT_URL . 'application' . DS);
define('PUBLIC_URL', ROOT_URL . 'public' . DS);
define('TEMPLATE_URL', PUBLIC_URL . 'template' . DS);

define('DEFAULT_MODULE', 'backend');
define('DEFAULT_CONTROLLER', 'dashboard');
define('DEFAULT_ACTION', 'index');

// ====================== DATABASE ===========================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'php_16_duy');

// ====================== DATABASE TABLE ===========================
define('TBL_BOOK', 'book');
define('TBL_CATEGORY', 'category');
define('TBL_GROUP', 'group');
define('TBL_PRIVILEGE', 'privilege');
define('TBL_USER', 'user');
