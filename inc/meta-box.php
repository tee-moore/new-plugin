<?php
// Добавляем блоки в основную колонку на страницах постов и пост. страниц
add_action('add_meta_boxes', 'myplugin_add_custom_box');
function myplugin_add_custom_box(){
    $screens = array( 'post', 'page' );
    //$id, $title, $callback, $screen, $screen (Название экрана для которого добавляется блок. Например может быть:Для типов записей: post, page, link, attachment или custom_post_type, Или для других страниц админки: link, comment.Можно указать несколько типов в массиве: array('post', 'page'). C версии 4.4.), $context, $priority, $callback_args
    add_meta_box( 'myplugin_sectionid', 'Название мета блока', 'new_plugin_meta_box_callback', $screens );
}

// HTML код блока
function new_plugin_meta_box_callback( $post, $meta ){
    $screens = $meta['args'];

    // Используем nonce для верификации
    wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

    // Поля формы для введения данных
    echo '<label for="myplugin_new_field">' . __("Description for this field", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id= "myplugin_new_field" name="myplugin_new_field" value="whatever" size="25" />';
}

// Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'myplugin_save_postdata' );
function myplugin_save_postdata( $post_id ) {
    // Убедимся что поле установлено.
    if ( ! isset( $_POST['myplugin_new_field'] ) )
        return;

    // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
    if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
        return;

    // если это автосохранение ничего не делаем
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return;

    // проверяем права юзера
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    // Все ОК. Теперь, нужно найти и сохранить данные
    // Очищаем значение поля input.
    $my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

    // Обновляем данные в базе данных.
    update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}