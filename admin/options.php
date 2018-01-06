<?php
// 2 – Dashboard
// 4 – Separator
// 5 – Posts
// 10 – Media
// 15 – Links
// 20 – Pages
// 25 – Comments
// 59 – Separator
// 60 – Appearance
// 65 – Plugins
// 70 – Users
// 75 – Tools
// 80 – Settings
// 99 – Separator
// $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position


/**
 * Add options page
 */
add_action('admin_menu', function(){
    add_menu_page( 'Main Settings', 'Main Settings', 'manage_options', 'new_plugin_my_setting', 'new_plugin_my_setting', '', 4 );
} );

/**
 * Function output options page
 */
function new_plugin_my_setting(){

    if( !empty($_POST) && check_admin_referer('name_of_my_action','name_of_nonce_field') ) {
        if(isset($_POST['save_options'])){
            new_plugin_save_options($_POST['option']);
        }
    }

    $settings = get_option( 'new_plugin_options', null );
    $option = $settings['option'];

    //settings_errors() не срабатывает автоматом на страницах отличных от опций
    if( get_current_screen()->parent_base !== 'options-general' ) {
        settings_errors('название_опции');
    }
    ?>

    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>
        <form action="" method="POST">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">Option:</th>
                        <td>
                            <input name="option" size="70" value="<?php echo $option;?>" type="text">
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
                wp_nonce_field('name_of_my_action','name_of_nonce_field');
                //$text, $type, $name, $wrap, $other_attributes
                submit_button( 'Save', 'primary', 'save_options', true );
            ?>
        </form>
    </div>
    <?php
}

function new_plugin_save_options( $option ) {
    $settings = [];
    if(empty($option)){
        return;
    }

    $settings['option'] = $option;
    $update = update_option( 'new_plugin_options', $settings, false );

    if( $update ) {
        echo message("Saved.", "updated");
    } else {
        echo message("Error.", "error");
    }
}


function message( $str, $state ) {
    return '<div id="message" class="' . $state . ' notice is-dismissible"><p>' . $str . '</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Close.</span></button></div>';
}

/**
 * Add subOptions page
 */

// $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function
// 
// 
// $parent_slug: 
// index.php - Консоль (Dashboard). Или спец. функция: add_dashboard_page();
// edit.php - Посты (Posts). Или спец. функция: add_posts_page();
// upload.php - Медиафайлы (Media). Или спец. функция: add_media_page();
// link-manager.php - Ссылки (Links). Или спец. функция: add_links_page();
// edit.php?post_type=page - Страницы (Pages). Или спец. функция: add_pages_page();
// edit-comments.php - Комментарии (Comments). Или спец. функция: add_comments_page();
// edit.php?post_type=your_post_type - Произвольные типы записей.
// themes.php - Внешний вид (Appearance). Или спец. функция: add_theme_page();
// plugins.php - Плагины (Plugins). Или спец. функция: add_plugins_page();
// users.php - Пользователи (Users). Или спец. функция: add_users_page();
// tools.php - Инструменты (Tools). Или спец. функция: add_management_page();
// options-general.php - Настройки (Settings). Или спец. функция: add_options_page()
// settings.php - Настройки (Settings) сети сайтов в MU режиме.
// 
// 
// // user_admin_menu — админ-меню пользователя;
// network_admin_menu — админ-меню сети;
// admin_menu — обычное административное меню.

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_submenu_page( 'new_plugin_my_setting', 'Main Settings', 'Main Settings', 'manage_options', 'new_plugin_my_setting' ); // like main option
    add_submenu_page( 'new_plugin_my_setting', 'Sub Settings', 'Sub Settings', 'manage_options', 'new_plugin_my_submenu_page', 'new_plugin_my_submenu_page' );
}

function new_plugin_my_submenu_page() {
    if( !empty($_POST) && check_admin_referer('name_of_my_action','name_of_nonce_field') ) {
        if(isset($_POST['save_options'])){
            new_plugin_save_options1($_POST['option1']);
        }
    }

    $settings = get_option( 'new_plugin_options1', null );
    $option1 = $settings['option1'];

    //settings_errors() не срабатывает автоматом на страницах отличных от опций
    if( get_current_screen()->parent_base !== 'options-general' ) {
        settings_errors('название_опции');
    }
    ?>

    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>
        <form action="" method="POST">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">Option 1:</th>
                        <td>
                            <input name="option1" size="70" value="<?php echo $option1;?>" type="text">
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
                wp_nonce_field('name_of_my_action','name_of_nonce_field');
                //$text, $type, $name, $wrap, $other_attributes
                submit_button( 'Save', 'primary', 'save_options', true );
            ?>
        </form>
    </div>
    <?php
}


function new_plugin_save_options1( $option ) {
    $settings = [];
    if(empty($option)){
        return;
    }

    $settings['option1'] = $option;
    $update = update_option( 'new_plugin_options1', $settings, false );

    if( $update ) {
        echo message("Saved.", "updated");
    } else {
        echo message("Error.", "error");
    }
}


function message1( $str, $state ) {
    return '<div id="message" class="' . $state . ' notice is-dismissible"><p>' . $str . '</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Close.</span></button></div>';
}