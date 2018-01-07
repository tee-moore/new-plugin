<?php
/**
 * Create_table in data base
 */
function my_plugin_create_table(){
    //Когда стоит использовать dbDelta?
    //Подходит для создания новых таблиц, полей, индексов, для изменения структуры полей.
    //Не подходит для изменения структуры индексов, для удаления полей или индексов. Любое удаление в структуре полей, нужно делать отдельными запросами. Изменение структуры имеющихся индексов также нужно делать отдельно.
    global $wpdb;

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $table_name = $wpdb->get_blog_prefix() . 'test_table';
    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

    $sql = "CREATE TABLE {$table_name} (
        id             BIGINT(20) unsigned NOT NULL auto_increment,
        product_id     BIGINT(20)   NOT NULL default 0,
        customer_email VARCHAR(255) NOT NULL default '',
        trans_no       VARCHAR(255) NOT NULL default '',
        trans_date     DATETIME     NOT NULL default '0000-00-00 00:00:00',
        license_key    VARCHAR(255) NOT NULL default '',
        download_url   VARCHAR(255) NOT NULL default '',
        meta           LONGTEXT     NOT NULL default '',
        PRIMARY KEY  (id),
        KEY trans_no (trans_no)
    )
    {$charset_collate};";

    dbDelta($sql);
}


/**
 * get from data base
 */
function my_plugin_get_my_data( $test ) {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'test_table';

    $data_test = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE `id` = %d LIMIT 1;", $test ) );
    return $data_test;
}


/**
 * set to data base
 */
function my_plugin_set_my_data( $test ) {
    global $wpdb;

    $wpdb->insert(
        'test_table',//Название таблицы в которую будем вставлять данные.
        array( 'column1' => $test ),//Данные которые нужно вставить ('колонка куда вставлять' => 'что вставлять').
        array( '%d' )//Формат данных который будет ассоциирован с указанными значениями в параметре $data. Если не указать, то для всех значений $data будет указан формат строки. При указании формата, WordPress переводит переданные данные в указанный формат перед тем, как сохранить данные в базу данных. Возможные форматы данных: %s - строка, %d - целое число, %f - дробное число
    )

    return $wpdb->insert_id;
}


/**
 * update in data base
 */
function my_plugin_update_my_data( $test ) {
    global $wpdb;

    $wpdb->update( 'test_table', //название таблицы которую нужно обновить.
    array( 'column1' => 'value1', 'column2' => $_GET['val'] ), //данные которые нужно обновить ('название колонки' => 'новое значение').
    array( 'ID' => 1 ), //Ассоциированный массив с условием для замены (WHERE) ( 'название колонки' => 'чему равно').
    array( '%s', '%d' ),  //Формат данных который будет ассоциирован с указанными значениями в параметре $data.
    array( '%d' ) //Формат данных который будет ассоциирован с указанными значениями в параметре $where. Возможные значения формата: %s - строка; %d - любое число; %f - FLOAT число. Если не указать формат, то все значения в WHERE будут обработаны как строки.
    );
}


/**
 * delete from data base
 */
function my_plugin_delete_my_data( $test ) {
    global $wpdb;

    // Удалим строку с полем ID=1 из таблицы table
    $wpdb->delete( 'table', array( 'ID' => 1 ) );

    // Укажем формат значения $where
    $wpdb->delete( 'table', array( 'ID' => '1' ), array( '%d' ) ); // 1 будет обработано как число (%d)...
}


/**
 * get_results from data base
 */
function my_plugin_get_results( $test ) {
    global $wpdb;

    $table_name = $wpdb->get_blog_prefix() . 'test_table';

    $fivesdrafts = $wpdb->get_results("SELECT ID, post_title FROM $table_name
        WHERE post_status = 'draft' AND post_author = 5");

    foreach ($fivesdrafts as $fivesdraft) {
        echo $fivesdraft->post_title;
    }
}
