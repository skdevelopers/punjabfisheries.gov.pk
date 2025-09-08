<?php

return [
    // Users with any of these roles will bypass row-level org scoping.
    'bypass_roles' => [
        'SuperAdmin',
        'DirectorGeneral',
    ],
];
