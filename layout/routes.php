<?php

return [
    '/' => 'controllers\Authentication@login',
    '/register' => 'controllers\Authentication@register',
    '/home' => 'controllers\Board@home',
    'error' => 'controllers\Error@notFound',
    '/users' => 'controllers\Authentication@users'
];
