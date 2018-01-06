<?php
//https://wp-kama.ru/function/register_post_type
add_action('init', 'register_post_types');
function register_post_types(){
    register_post_type('my_post_type_name', array(
        'label'  => null,
        //Имя типа записи помеченное для перевода на другой язык.По умолчанию: $post_type
        'labels' => array(
        //массив содержащий в себе названия ярлыков для типа записи.
        //По умолчанию: если не установлено, name и singular_name примят значение аргумента label
                'name' => 'test',
                // основное название для типа записи, обычно во множественном числе.
                'singular_name' => 'test',
                // название для одной записи этого типа.
                'add_new' => 'test',
                // текст для добавления новой записи, как "добавить новый" у постов в админ-панели. Если нужно использовать перевод названия, вписывайте подобным образом: _x('Add New', 'product');
                'add_new_item' => 'test',
                // текст заголовка у вновь создаваемой записи в админ-панели. Как "Добавить новый пост" у постов.
                'edit_item' => 'test',
                // текст для редактирования типа записи. По умолчанию: редактировать пост/редактировать страницу.
                'new_item' => 'test',
                // текст новой записи. По умолчанию: "Новый пост"
                'view_item' => 'test',
                // текст для просмотра записи этого типа. По умолчанию: "Посмотреть пост"/"Посмотреть страницу".
                'search_items' => 'test',
                // текст для поиска по этим типам записи. По умолчанию "Найти пост"/"найти страницу".
                'not_found' => 'test',
                // текст, если в результате поиска ничего не было найдено. По умолчанию: "Постов не было найдено"/"Страниц не было найдено".
                'not_found_in_trash' => 'test',
                // текст, если не было найдено в корзине. По умолчанию "Постов не было найдено в корзине"/"Страниц не было найдено в корзине".
                'parent_item_colon' => 'test',
                // текст для родительских типов. Этот параметр не используется для не древовидных типов записей. По умолчанию "Родительская страница".
                'all_items' => 'test',
                // Все записи. По умолчанию равен menu_name
                'archives' => 'test',
                // Архивы записей. По умолчанию равен all_items
                'insert_into_item' => 'test',
                // Вставить в запись
                'uploaded_to_this_item' => 'test',
                // Загружено для этой записи
                'featured_image' => 'test',
                // Миниатюра записи
                'set_featured_image' => 'test',
                // Установить миниатюру записи
                'remove_featured_image' => 'test',
                // Удалить миниатюру записи
                'use_featured_image' => 'test',
                // Использовать как миниатюру записи
                'filter_items_list' => 'test',
                // Фильтровать список записей
                'items_list_navigation' => 'test',
                // Навигация по записям
                'items_list' => 'test',
                // Список записей
                'menu_name' => 'test',
                // Название меню. По умолчанию равен name.
                'name_admin_bar' => 'test',
                // Название в админ баре (тулбаре). По умолчанию равен singular_name.
                'view_items' => 'test',
                // Название в тулбаре, для страницы архива типа записей. По умолчанию: «View Posts» / «View Pages». С WP 4.7.
                'attributes' => 'test',
                // Название для метабокса атрибутов записи (у страниц это метабокс «Свойства страницы» - «Page Attributes»). По умолчанию: «Post Attributes» или «Page Attributes». С WP 4.7.
        ),
        'description'         => 'test',
        //Короткое описание этого типа записи.По умолчанию: ''
        'public'              => true,
        //Определяет является ли тип записи публичным или нет. На основе этого параметра строятся много других.false: show_ui = false, publicly_queryable = false, exclude_from_search = true, show_in_nav_menus = false и наоборот. По умолчанию: false
        'publicly_queryable'  => null,
        //Запросы относящиеся к этому типу записей будут работать во фронтэнде (в шаблоне сайта). По умолчанию: значение глобального аргумента (public)
        'exclude_from_search' => null,
        //Исключить ли этот тип записей из поиска по сайту. 1 (true) - да, 0 (false) - нет.
        //Если этот параметр установлен в true, то для терминов таксономий привязанных к этому типу записей, вывод работать не будет (пусть даже параметр public равен true). Т.е. этот тип постов будет полностью исключен из запросов типа query_posts()!
        //По умолчанию: обратное значение аргумента public
        'show_ui'             => true,
        //Определяет нужно ли создавать логику управления типом записи из админ-панели. Нужно ли создавать UI типа записи, чтобы им можно было управлять.
        //Так, например, если указать true, а в show_in_menu = false. То у нас будет возможность зайти на страницу управления типом записи, т.е. движок будет понимать и обрабатывать такие запросы, но ссылки на эту страницу в меню не будет ...
        //По умолчанию: значение аргумента public
        'show_in_menu'        => true,
        //Показывать ли тип записи в администраторском меню и где именно показывать управление типом записи. Аргумент show_ui должен быть включен!
        //false - не показывать в администраторском меню.
        //true - показывать как меню первого уровня.
        //строка - показывать как под-меню меню первого уровня, например, подменю для 'tools.php' или 'edit.php?post_type=page' для произвольных типов меню нужно указывать $menu_slug см. add_menu_page().
        //ЗАМЕТКА: Если используется строка для того, чтобы показать как подменю, какого-нибудь главного меню, создаваемого плагином, этот пункт станет первым в списке и соответственно изменит расположение пунктов меню. Для того, чтобы этого не произошло, в плагине, который создает свое меню нужно установить приоритет для действия admin_menu 9 или ниже.
        //По умолчанию: null
        'show_in_admin_bar'   => true,
        //Сделать этот тип доступным из админ бара. По умолчанию: null (значение $show_in_menu)
        'show_in_nav_menus'   => null,
        //Включить возможность выбирать этот тип записи в меню навигации.По умолчанию: значение глобального аргумента
        'show_in_rest'        => null,
        //Нужно ли включать тип записи в REST API. С WP 4.7.
        'rest_base'           => null,
        //Ярлык в REST API. По умолчанию, название типа записи. С WP 4.7. По умолчанию: $post_type
        'rest_controller_class' => null,
        //Название класса контроллера в REST API. С WP 4.7.По умолчанию:'WP_REST_Posts_Controller'
        'menu_position'       => 1,
        //Позиция где должно расположится меню нового типа записи:
        // 1 — в самом верху меню
        // 2-3 — под «Консоль»
        // 4-9 — под «Записи»
        // 10-14 — под «Медиафайлы»
        // 15-19 — под «Ссылки»
        // 20-24 — под «Страницы»
        // 25-59 — под «Комментарии» (по умолчанию, null)
        // 60-64 — под «Внешний вид»
        // 65-69 — под «Плагины»
        // 70-74 — под «Пользователи»
        // 75-79 — под «Инструменты»
        // 80-99 — под «Параметры»
        // 100+ — под разделителем после «Параметры»
        // По умолчанию: null
        'menu_icon'           => null,
        //Ссылка на картинку, которая будет использоваться для этого меню. С выходом WordPress 3.8 появился новый пакет иконок Dashicons, который входит в состав ядра WordPress. Это комплект из более 150 векторных изображений. Чтобы установит одну из иконок, напишите её название в этот параметр. Например иконка постов, называется так: dashicons-admin-post, а ссылок dashicons-admin-links. По умолчанию: null - иконка как у меню постов
        //'capability_type'   => 'post',
        //Строка которая будет маркером для установки прав для этого типа записи.
        //Встроенные маркеры это: post и page.
        //Можно передавать массив, где первое значение будет использоваться для единственного числа, а второе для множественного, например: array('story', 'stories'). Если передается строка, то для множественного числа просто прибавляется 's' на конце.
        //capability_type используется для построения списка прав, которые будут записаны в параметр 'capabilities'.
        //При установке нестандартного маркера (не post или page), параметр map_meta_cap можно установить в true или в false:
        //    Если поставить true — то WordPress автоматически сгенерирует группу прав для параметра 'capabilities' на основе введенных здесь данных. При этом указанные в параметре 'capabilities' права дополнят имеющийся список прав.
        //    Если установить false — то WordPress ничего генерировать не будет и вам придется самому полностью прописать все возможные права для этого типа записи в параметре 'capabilities'.
        //По умолчанию: "post"
        //'capabilities'      => 'post',
        //Массив прав для этого типа записи. подробнее: https://wp-kama.ru/function/register_post_type#capabilities-massiv
        //'map_meta_cap'      => null,
        //Ставим true, чтобы включить дефолтный обработчик специальных прав map_meta_cap(). Он преобразует неоднозначные права (edit_post - один пользователь может, а другой нет) в примитивные (edit_posts - все пользователи могут). Обычно для типов постов этот параметр нужно включать, если типу поста устанавливаются особые права (отличные от 'post').
        //Заметка: если установить в false, то стандартная роль "Администратор" не сможет редактировать этот тип записи. Для снятия такого ограничения придется добавить право 'edit_{post_type}s' к роли администратор.
        //По умолчанию: false
        'hierarchical'        => false,
        //Будут ли записи этого типа иметь древовидную структуру (как постоянные страницы).
        //true - да, будут древовидными false - нет, будут связаны с таксономией (категориями)
        //По умолчанию: false
        'supports'            => array('title','editor'),
        //Вспомогательные поля на странице создания/редактирования этого типа записи. Метки для вызова функции add_post_type_support().
        // title - блок заголовка;
        // editor - блок для ввода контента;
        // author - блог выбора автора;
        // thumbnail блок выбора миниатюры записи. Нужно также включить поддержку в установке темы post-thumbnails;
        // excerpt - блок ввода цитаты;
        // trackbacks - блок уведомлений;
        // custom-fields - блок установки произвольных полей;
        // comments - блок комментариев;
        // revisions - блок ревизий (не отображается пока нет ревизий);
        // page-attributes - блок атрибутов постоянных страниц (шаблон и древовидная связь записей, древовидность должна быть включена).
        // post-formats – блок форматов записи, если они включены в теме.
        // По умолчанию: array('title','editor')
        'register_meta_box_cb' => null,
        //callback функция, которая будет срабатывать при установки мета блоков для страницы создания/редактирования этого типа записи. Используйте remove_meta_box() и add_meta_box() в callback функции.По умолчанию: нет
        'taxonomies'          => array(),
        //Массив зарегистрированных таксономий, которые будут связанны с этим типом записей, например: category или post_tag. Связать таксономии с записью можно позднее через функцию register_taxonomy_for_object_type(). Таксономии нужно регистрировать с помощью функции register_taxonomy().По умолчанию: нет
        'permalink_epmask' => null,
        //Индекс конечной точки, с которой будет ассоциирован создаваемый тип записи. Как правило этот параметр не используется. Тут можно указать след. константы или их комбинацию соединенную через &:
        // EP_NONE
        // EP_PERMALINK
        // EP_ATTACHMENT
        // EP_DATE
        // EP_YEAR
        // EP_MONTH
        // EP_DAY
        // EP_ROOT
        // EP_COMMENTS
        // EP_SEARCH
        // EP_CATEGORIES
        // EP_TAGS
        // EP_AUTHORS
        // EP_PAGES
        // EP_ALL
        // подробнее: https://wp-kama.ru/function/register_post_type#permalink_epmask-stroka
        'has_archive'         => false,
        //Включить поддержку страниц архивов для этого типа записей (пр. УРЛ записи выглядит так: site.ru/type/post_name, тогда УРЛ архива будет такой: site.ru/type. Если указать строку, то она будет использована в ЧПУ. Например, укажем тут typepage и получим ссылку на архив типа записи такого вида: site.ru/typepage Файл этого архива в теме будет иметь вид archive-type.php). Для архивов будет добавлено новое правило ЧПУ, если аргумент rewrite включен.По умолчанию: false
        'rewrite'             => true,
        //Использовать ли ЧПУ для этого типа записи. Чтобы не использовать ЧПУ укажите false. По умолчанию: true — название типа записи используется как префикс в ссылке. Можно в массиве указать дополнительные параметры для построения ЧПУ:
        //slug (строка) - Префикс в ЧПУ (/префикс/ярлык_записи). Используйте array( 'slug' => $slug ), чтобы создать другой префикс. В этом параметре можно указывать плейсхолдеры типа %category%. Но их нужно создать с помощью add_rewrite_tag() и научить WP их понимать. По умолчанию: название типа записи
        // with_front (логический) - Нужно ли в начало вставлять общий префикс из настроек. Префикс берется из $wp_rewite->front. Например, если структура постоянных ссылок записей в настройках имеет вид blog/%postname%, то при false получим: /news/название_поста, а при true получим: /blog/news/название_поста.По умолчанию: true
        // feeds (логический) - Добавить ли правило ЧПУ для RSS ленты этого типа записи.По умолчанию: значение аргумента has_archive
        // pages (логический) - Добавить ли правило ЧПУ для пагинации архива записей этого типа. Пр: /post_type/page/2. По умолчанию: true
        // По умолчанию: true (тип записи используется как префикс)
        'query_var'           => true,
        //Ставим false, чтобы убрать возможность запросов или устанавливаем название запроса для этого типа записей.по умолчанию: true - устанавливается аргумент $post_type
        'can_export' => false,
        //Возможность экспорта этого типа записей.По умолчанию: true
        'delete_with_user' => null,
        //true - удалять записи этого типа принадлежащие пользователю при удалении пользователя. Если включена корзина, записи не удаляться, а поместятся в корзину.
        //false - при удалении пользователя его записи этого типа никак не будут обрабатываться.
        //null - записи удаляться или будут перемещены в корзину, если post_type_supports('author') установлена. И не обработаются, если поддержки 'author' у типа записи нет.По умолчанию: null
        '_builtin' => false,
        //Для внутреннего использования! True, если это встроенный/внутренний типа записи.По умолчанию: false
        '_edit_link' => null,
        //Для внутреннего использования! Часть URL в ссылке на редактирования этого типа записи.По умолчанию: 'post.php?post=%d'
    ) );
}


//Примеры
//#1 Регистрация нового типа записи
//Пример регистрации произвольного типа записей "book". Также в примере показано как включить сообщения при обновлении и поддержку раздела помощь.
add_action('init', 'my_custom_init');
function my_custom_init(){
    register_post_type('book', array(
        'labels'             => array(
            'name'               => 'Книги', // Основное название типа записи
            'singular_name'      => 'Книга', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую книгу',
            'edit_item'          => 'Редактировать книгу',
            'new_item'           => 'Новая книга',
            'view_item'          => 'Посмотреть книгу',
            'search_items'       => 'Найти книгу',
            'not_found'          =>  'Книг не найдено',
            'not_found_in_trash' => 'В корзине книг не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Книги'

          ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );
}

// Сообщения при публикации или изменении типа записи book:
add_filter('post_updated_messages', 'book_updated_messages');
function book_updated_messages( $messages ) {
    global $post;

    $messages['book'] = array(
        0 => '', // Не используется. Сообщения используются с индекса 1.
        1 => sprintf( 'Book обновлено. <a href="%s">Посмотреть запись book</a>', esc_url( get_permalink($post->ID) ) ),
        2 => 'Произвольное поле обновлено.',
        3 => 'Произвольное поле удалено.',
        4 => 'Запись Book обновлена.',
        /* %s: дата и время ревизии */
        5 => isset($_GET['revision']) ? sprintf( 'Запись Book восстановлена из ревизии %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( 'Запись Book опубликована. <a href="%s">Перейти к записи book</a>', esc_url( get_permalink($post->ID) ) ),
        7 => 'Запись Book сохранена.',
        8 => sprintf( 'Запись Book сохранена. <a target="_blank" href="%s">Предпросмотр записи book</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
        9 => sprintf( 'Запись Book запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр записи book</a>',
          // Как форматировать даты в PHP можно посмотреть тут: http://php.net/date
          date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) ) ),
        10 => sprintf( 'Черновик записи Book обновлен. <a target="_blank" href="%s">Предпросмотр записи book</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
    );

    return $messages;
}

// Раздел "помощь" типа записи book:
add_action( 'contextual_help', 'add_help_text', 10, 3 );
function add_help_text( $contextual_help, $screen_id, $screen ){
    //$contextual_help .= print_r($screen); // используйте чтобы помочь определить параметр $screen->id
    if('book' == $screen->id ) {
        $contextual_help = '
        <p>Напоминалка при редактировании записи book:</p>
        <ul>
            <li>Указать жанр, например Фантастика или История.</li>
            <li>Указать автора книги.</li>
        </ul>
        <p>Если нужно запланировать публикацию на будущее:</p>
        <ul>
            <li>В блоке с кнопкой "опубликовать" нажмите редактировать дату.</li>
            <li>Измените дату на нужную, будущую и подтвердите изменения кнопкой ниже "ОК".</li>
        </ul>
        <p><strong>За дополнительной информацией обращайтесь:</strong></p>
        <p><a href="/" target="_blank">Блог о WordPress</a></p>
        <p><a href="http://wordpress.org/support/" target="_blank">Форум поддержки</a></p>
        ';
    }
    elseif( 'edit-book' == $screen->id ) {
        $contextual_help = '<p>Это раздел помощи показанный для типа записи Book и т.д. и т.п.</p>';
    }

    return $contextual_help;
}


//#2 Добавление элемента таксономии в ЧПУ
//Для нового типа записи можно указать разные ЧПУ с помощью параметра rewrite. Этот пример показывает, как добавить в ЧПУ нового типа записи таксономию.
//Допустим, мы регистрируем типа записи catalog и таксономию products для него. Далее, нам нужно чтобы при публикации записи и выборе для нее элемента таксономии. Этот элемент добавлялся в ЧПУ и в результате ссылка на тип записи выглядела так:http://site.ru/post_type_name/taxonomy_term_name/post_name.
//Для этого нужно указать аргумент slug в параметре rewrite при регистрации типа записи:
//'rewrite' => array( 'slug'=>'catalog/%products%', 'with_front' => false ),
//'has_archive' => 'catalog', // если нужна страница архива тут указываем её ярлык а не true
//Теперь нужно добавить хук, чтобы заменять %products% при получении ссылки на запись через функцию get_permalink() и производные от нее функции:

## Отфильтруем ЧПУ произвольного типа
// сам фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'products_permalink', 1, 2);

function products_permalink( $permalink, $post ){
    // выходим если это не наш тип записи: без холдера %products%
    if( strpos($permalink, '%products%') === FALSE )
        return $permalink;

    // Получаем элементы таксы
    $terms = get_the_terms($post, 'products');
    // если есть элемент заменим холдер
    if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
        $taxonomy_slug = $terms[0]->slug;
    // элемента нет, а должен быть...
    else
        $taxonomy_slug = 'no-products';

    return str_replace('%products%', $taxonomy_slug, $permalink );
}

// В результате ЧПУ записи будет как указано выше и ссылка будет распознаваться правилами перезаписи WordPress.



#3 Добавление таксономии в ЧПУ (у записи и таксы одинаковый префикс)
#Этот пример показывает как создать запись типа Вопросы и разделы для нее. При этом ЧПУ будут:
//     У записи: site.ru/faq/{категория}/{ярлык-записи}
//     У таксы: site.ru/faq/{категория}
// Тут важно сначала регнуть таксу, а потом тип записи...

add_action( 'init', 'register_faq_post_type' );
function register_faq_post_type() {
    // Раздел вопроса - faqcat
    register_taxonomy('faqcat', array('faq'), array(
        'label'                 => 'Раздел вопроса', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Разделы вопросов',
            'singular_name'     => 'Раздел вопроса',
            'search_items'      => 'Искать Раздел вопроса',
            'all_items'         => 'Все Разделы вопросов',
            'parent_item'       => 'Родит. раздел вопроса',
            'parent_item_colon' => 'Родит. раздел вопроса:',
            'edit_item'         => 'Ред. Раздел вопроса',
            'update_item'       => 'Обновить Раздел вопроса',
            'add_new_item'      => 'Добавить Раздел вопроса',
            'new_item_name'     => 'Новый Раздел вопроса',
            'menu_name'         => 'Раздел вопроса',
        ),
        'description'           => 'Рубрики для раздела вопросов', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'faq', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ) );

    // тип записи - вопросы - faq
    register_post_type('faq', array(
        'label'               => 'Вопросы',
        'labels'              => array(
            'name'          => 'Вопросы',
            'singular_name' => 'Вопрос',
            'menu_name'     => 'Архив вопросов',
            'all_items'     => 'Все вопросы',
            'add_new'       => 'Добавить вопрос',
            'add_new_item'  => 'Добавить новый вопрос',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать вопрос',
            'new_item'      => 'Новый вопрос',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'faq/%faqcat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'faq',
        'query_var'           => true,
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'faqcat' ),
    ) );

}

## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'faq_permalink', 1, 2);
function faq_permalink( $permalink, $post ){
    // выходим если это не наш тип записи: без холдера %products%
    if( strpos($permalink, '%faqcat%') === false )
        return $permalink;

    // Получаем элементы таксы
    $terms = get_the_terms($post, 'faqcat');
    // если есть элемент заменим холдер
    if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
        $term_slug = array_pop($terms)->slug;
    // элемента нет, а должен быть...
    else
        $term_slug = 'no-faqcat';

    return str_replace('%faqcat%', $term_slug, $permalink );
}