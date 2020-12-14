<?php

/**
* author: TeamDash
* description: Configuration of the routes available
**/

return [
    '/' => 'controllers\Authentication@login',
    '/register' => 'controllers\Authentication@register',
    '/home' => 'controllers\Home@home',
    'error' => 'controllers\Error@notFound'
];
