<?php
// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy(){
    //1Название создаваемой таксономии., 2Название типов постов, к которым будет привязана таксономия. В этом параметре, например, можно указать 'post', тогда у обычных постов WordPress появится новая таксономия (возможность классификации).3Массив аргументов определяющий признаки таксономии.
    register_taxonomy('taxonomy', array('post'), array(
        'label'                 => '',
        //Название таксономии во множественном числе (для отображения в админке).По умолчанию: используется значение аргумента $labels->name 
        'labels'                => array(
            //https://wp-kama.ru/function/get_taxonomy_labels
            'name'              => 'Genres',
            //Имя таксономии, обычно во множественном числе. По умолчанию _x( 'Post Tags', 'taxonomy general name' ) или _x( 'Categories', 'taxonomy general name' );
            'singular_name'     => 'Genre',
            //Название для одного элемента этой таксономии. По умолчанию _x( 'Post Tag', 'taxonomy singular name' ) или _x( 'Category', 'taxonomy singular name' );
            'menu_name' => 'Genre',
            //Текст для названия меню. Эта строка обозначает название для пунктов меню. По умолчанию значение параметра name;
            'search_items'      => 'Search Genres',
            //Текст для поиска элемента таксономии. По умолчанию __( 'Search Tags' ) или __( 'Search Categories' );
            'popular_items' => 'Genre',
            //Текст для блока популярных элементов. __( 'Popular Tags' ) или null;
            'all_items'         => 'All Genres',
            //Текст для всех элементов. __( 'All Tags' ) или __( 'All Categories' );
            'view_item '        => 'View Genre',
            //Текст для просмотра термина таксономии. По умолчанию: "Посмотреть метку", "Посмотреть категорию". Используется например, в админ баре (тулбаре).
            'parent_item'       => 'Parent Genre',
            //Текст для родительского элемента таксономии. Этот аргумент не используется для не древовидных таксономий. По умолчанию null или __( 'Parent Category' );
            'parent_item_colon' => 'Parent Genre:',
            //Текст для родительского элемента таксономии, тоже что и parent_item но с двоеточием в конце. По умолчанию нет или __( 'Parent Category:' );
            'edit_item'         => 'Edit Genre',
            //Текст для редактирования элемента. По умолчанию __( 'Edit Tag' ) или __( 'Edit Category' );
            'update_item'       => 'Update Genre',
            //Текст для обновления элемента. По умолчанию __( 'Update Tag' ) или __( 'Update Category' );
            'add_new_item'      => 'Add New Genre',
            //Текст для добавления нового элемента таксономии. По умолчанию __( 'Add New Tag' ) или __( 'Add New Category' );
            'new_item_name'     => 'New Genre Name',
            //Текст для создания нового элемента таксономии. По умолчанию __( 'New Tag Name' ) или __( 'New Category Name' );
            'separate_items_with_commas' => '',
            //Текст описывающий, что элементы нужно разделять запятыми (для блога в админке). Не работает для древовидного типа. По умолчанию __( 'Separate tags with commas' ) или null;
            'add_or_remove_items' => '',
            //Текст для "удаления или добавления элемента", который используется в блоке админке, при отключенном javascript. Не действует для древовидных таксономий. По умолчанию __( 'Add or remove tags' ) или null;
            'choose_from_most_used' => '',
            //текст для блога при редактировании поста "выберите из часто используемых". Не используется для древовидных таксономий. По умолчанию __( 'Choose from the most used tags' ) или null;
            'not_found' => '',
            //Текст "не найдено", который отображается, если при клике на часто используемые ни один термин не был найден.
        ),
        'description'           => '',
        // описание таксономии
        'public'                => true,
        //Показывать ли эту таксономию в интерфейсе админ-панели. Это значение передается параметрам publicly_queryable, show_ui, show_in_nav_menus если для них не установлено свое значение.По умолчанию: true
        'publicly_queryable'    => null,
        //Имеют ли пользователи доступ к элементам таксономии во внешней части сайта. Если не установлено, то берется значение параметра public. C версии 4.5.По умолчанию: null (равен аргументу public)
        'show_in_nav_menus'     => true,
        //true даст возможность выбирать элементы этой таксономии в навигационном меню.По умолчанию: если нет, равно аргументу public
        'show_ui'               => true,
        //Показывать блок управления этой таксономией в админке.По умолчанию: если нет, равно аргументу public
        'show_in_menu' => true,
        //Показывать ли таксономию в админ-меню.
        //true - таксономия будет показана как подменю у типа записи, к которой она прикреплена.
        //false - подменю не будет показано.
        //Параметр $show_ui должен быть включен (true).
        //По умолчанию: если нет, равно аргументу show_ui
        'show_tagcloud'         => true,
        //Создать виджет облако элементов этой таксономии (как облако меток).По умолчанию: если нет, равно аргументу show_ui
        'show_in_rest'          => null,
        //Нужно ли включать таксономию в REST API. С WP 4.7.
        'rest_base'             => null,
        //Ярлык в REST API. По умолчанию, название таксономии. С WP 4.7.По умолчанию: $taxonomy
        'rest_controller_class' => null,
        //Название класса контроллера в REST API. С WP 4.7.По умолчанию: 'WP_REST_Terms_Controller'
        'hierarchical'          => false,
        //true - таксономия будет древовидная (как категории). false - будет не древовидная (как метки).По умолчанию: false
        'update_count_callback' => '',
        //Название функции, которая будет вызываться для обновления количества записей в данной таксономии, для типа(ов) записей которые ассоциированы с этой таксономией.По умолчанию: нет
        'rewrite'               => true,
        //false - отключит перезапись. Если указать массив, то можно задать произвольный параметр запроса (query var). А по умолчанию будет использоваться параметр $taxonomy.Возможные аргументы массива:
        //slug - предваряет таксономии этой строкой. По умолчанию название таксономии;
        //with_front - позволяет установить префикс для постоянной ссылки. По умолчанию true;
        //hierarchical - true - включает поддержку древовидных URL (с версии 3.1). По умолчанию false;
        //Массив передается в функцию add_permastruct(), поэтому тут также можно указать аргументы этой функции.По умолчанию: true
        //'query_var'             => $taxonomy,
        //Если указать false, выключит параметры запроса и сам запрос. Или можно указать строку, чтобы изменить параметр запроса (query var). По умолчанию будет использоваться параметр $taxonomy - название таксономии.По умолчанию: $taxonomy
        'capabilities'          => array(),
        //Массив прав для этой таксономии:
        // manage_terms - 'manage_categories'
        // edit_terms - 'manage_categories'
        // delete_terms - 'manage_categories'
        // assign_terms - 'edit_posts'
        // По умолчанию: нет
        'meta_box_cb'           => null,
        //callback функция. Отвечает за то, как будет отображаться таксономия в метабоксе (с версии 3.8).Встроенные названия функций:
        // post_categories_meta_box - показывать как категории
        // post_tags_meta_box - показывать как метки.
        // Если указать false, то метабокс будет отключен вообще.По умолчанию: null
        'show_admin_column'     => false,
        //Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)По умолчанию: false
        '_builtin'              => false,
        //Параметр предназначен для разработчиков. Если переключить на true, то это будет означать что эта таксономия относится к внутренним таксономия WordPress и не является встроенной (кастомной).По умолчанию: false
        'show_in_quick_edit'    => null,
        //Показывать ли таксономию в панели быстрого редактирования записи (в таблице, списке всех записей, при нажатии на кнопку "свойства"). С версии 4.2.По умолчанию: null (значение show_ui)
        'sort' => null,
        //Следует ли этой таксономии запоминать порядок в котором созданные элементы (термины) прикрепляются к объектам (записям).По умолчанию: null
    ) );
}


//Примеры
#1. Регистрация таксономий
//Пример регистрации двух таксономий "genres" и "writers" для постов типа "book". Этот код можно вставить в файл темы functions.php. Некоторые аргументы рассчитаны на версию 3.1+:
// хук, через который подключается функция
// регистрирующая новые таксономии (create_book_taxonomies)
add_action( 'init', 'create_book_taxonomies' );

// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
function create_book_taxonomies(){
    // определяем заголовки для 'genre'
    $labels = array(
        'name' => _x( 'Genres', 'taxonomy general name' ),
        'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Genres' ),
        'all_items' => __( 'All Genres' ),
        'parent_item' => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item' => __( 'Edit Genre' ),
        'update_item' => __( 'Update Genre' ),
        'add_new_item' => __( 'Add New Genre' ),
        'new_item_name' => __( 'New Genre Name' ),
        'menu_name' => __( 'Genre' ),
    );

    // Добавляем древовидную таксономию 'genre' (как категории)
    register_taxonomy('genre', array('book'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'genre' ),
    ));

    // определяем заголовки для 'writer'
    $labels = array(
        'name' => _x( 'Writers', 'taxonomy general name' ),
        'singular_name' => _x( 'Writer', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Writers' ),
        'popular_items' => __( 'Popular Writers' ),
        'all_items' => __( 'All Writers' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Writer' ),
        'update_item' => __( 'Update Writer' ),
        'add_new_item' => __( 'Add New Writer' ),
        'new_item_name' => __( 'New Writer Name' ),
        'separate_items_with_commas' => __( 'Separate writers with commas' ),
        'add_or_remove_items' => __( 'Add or remove writers' ),
        'choose_from_most_used' => __( 'Choose from the most used writers' ),
        'menu_name' => __( 'Writers' ),
    );

    // Добавляем НЕ древовидную таксономию 'writer' (как метки)
    register_taxonomy('writer', 'book',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'writer' ),
    ));
}