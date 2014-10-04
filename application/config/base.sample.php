<?php
/**
 * @author: freefcw
 * Date: 12/29/13
 * Time: 10:46 PM
 */

return array(
    'name'                => 'iodine',
    'team'                => 'hustoj/iodine',
    'desc'                => 'yet another online judge',
    'keyword'             => 'online judge, programming, oi, oj, iodine',
    'domain'              => 'youriodine.yourdomain.com',
    'base_url'            => '/path/to/iodine/', // ends with /, for example '/oj/'
    'salt'                => 'iodine',
    'oi_mode'             => false,
    'show_ac_code'        => false, // show others' code after AC
    'submit_time'         => 5, // in second
    'captcha_mode'        => false, // false, 'local', 'recaptcha'
    'captcha_public_key'  => 'YOUR-RECAPTCHA-PUBLIC-KEY',
    'captcha_private_key' => 'YOUR-RECAPTCHA-PRIVATE-KEY',

    'data_dir'            => '/home/hoj/data',
);
