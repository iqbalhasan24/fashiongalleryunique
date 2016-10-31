<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => '/var/www/html/mdlive_dashboard/vendor/bin/wkhtmltopdf-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/var/www/html/mdlive_dashboard/vendor/bin/wkhtmltoimage-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
