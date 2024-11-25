<?php

define('APP_ROOT_DIR', '/web');               // the APP_ROOT_DIR constant should be the same value as $request_uri[0]

define ('ROOT_DIR', 'C:\xampp\backend');
    define('APP_DIR', ROOT_DIR.'\app');
        define('CONTROLLER_DIR', APP_DIR.'\controller');
        define('MODEL_DIR', APP_DIR.'\model');
        define('VIEW_DIR', APP_DIR.'\view');
    define('FRAMEWORK_DIR', ROOT_DIR.'\framework');
        define('AUTOLOADER_DIR', FRAMEWORK_DIR.'\autoloader');
        define('CLASSABSTRACT_DIR', FRAMEWORK_DIR.'\class_abstract');
        define('CLASSINTERFACE_DIR', FRAMEWORK_DIR.'\class_interface');
        define('ROUTES_DIR', FRAMEWORK_DIR.'\routes');
        define('SESSIONMANAGER_DIR', FRAMEWORK_DIR.'\session_manager');
        define('VALIDATOR_DIR', FRAMEWORK_DIR.'\validator');
    define('VIEWS_DIR', ROOT_DIR.'\views');
        define('PARTIALS_DIR', VIEWS_DIR.'\partials');
        define('LAYOUTS_DIR', VIEWS_DIR.'\layouts');
        define('TEMPLATES_DIR', VIEWS_DIR.'\templates');

?>