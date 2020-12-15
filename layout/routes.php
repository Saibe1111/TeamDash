<?php

/**
* author: TeamDash
* description: Configuration of the routes available
**/

return [

    '/' => 'controllers\User@login',

    '/register' => 'controllers\User@register',

    '/profile' => 'controllers\Profile@profile',

    '/remove' => 'controllers\Profile@remove',

    '/logout' => 'controllers\User@logout',

    '/home' => 'controllers\Home@home',

    '/board/([0-9]+)' => 'controllers\Board@board',

    '/board/dt/([0-9]+)/([0-9]+)' => 'controllers\Board@deleteTask',

    '/board/dp/([0-9]+)' => 'controllers\Board@deleteProject',
    
    'error' => 'controllers\Error@notFound'

];
