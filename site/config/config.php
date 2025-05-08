<?php 

return [
    'debug' => true,
    'sitemap.ignore' => ['error'],
    'url'=>[
        'https://datacraft.amauryhamon.com',
        'https://datacraft.test'
    ],
    'routes' => [
        // First-level route (e.g., /page)
        [
        'pattern' => '([a-zA-Z0-9-_]+)',
        'action' => function ($id) {
            $customHeader = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? null;
            $ogimage = site()->url() . '/' . $id;
            if ($customHeader !== 'fetch') {
            return new Page([
                'slug' => $id,
                'template' => 'home',
                'content' => [
                'ogimage' => $ogimage
                ]
            ]);
            }
            return $this->next();  // Only necessary if you want to pass to another route if conditions are not met
        }
        ],
        // Second-level route (e.g., /page/subpage)
        [
        'pattern' => '([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)','([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)',
        'action' => function ($id, $subpage) {
            $customHeader = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? null;
            $ogimage = site()->url() . '/' . $id . '/' . $subpage;
            if ($customHeader !== 'fetch') {
            return new Page([
                'slug' => $id,
                'template' => 'home',
                'content' => [
                'ogimage' => $ogimage
                ]
            ]);
            }
            return $this->next();  // Only necessary if you want to pass to another route if conditions are not met
        }
        ],
    ]


    
];
