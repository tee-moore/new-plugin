<?php


$base_url = "http://downloadcenter.nikonimglib.com/en/index.html";
$base_referer = "http://downloadcenter.nikonimglib.com/en/index.html";
$cookiefile = "C:/wamp64/www/test.loc/tools/cookie.txt";


function curl_get( $url, $referer, $postdata = null, $cookiefile ) {

    global $galaxyS6;
    file_put_contents( $cookiefile, "" );

    $ch = curl_init($url);
    //возврват в переменную
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    //следовать по редиректу
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    //юзер агент
    curl_setopt( $ch, CURLOPT_USERAGENT, $galaxyS6 );
    //заголовки
    curl_setopt( $ch, CURLOPT_HEADER, true );
    // curl_setopt( $ch, CURLOPT_NOBODY, true );
    // curl_setopt( $ch, CURLOPT_HTTPHEADER, [
    //     'X-Requested_With: XMLHttpRequest',
    //     'Accept-Language: ru-Ru'
    // ]);
    curl_setopt( $ch, CURLOPT_REFERER, $referer );
    //cookie
    curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookiefile );
    curl_setopt( $ch, CURLOPT_COOKIEFILE, $cookiefile );
    //новая сессия
    //curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
    //https
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    //прокси сервера
    // curl_setopt( $ch, CURLOPT_PROXY, '168.102.134.47:8080' );
    // curl_setopt( $ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP );
    //таймаут загрузки данных
    curl_setopt( $ch, CURLOPT_TIMEOUT, 9 );
    //таймаут коннекта
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 6 );

    //отправка post поля
    //if ($postdata){
    //curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata );
    //} 


    $html = curl_exec( $ch );
    curl_close( $ch );
    return $html;
}

$html = curl_get( $base_url, $base_referer, null, $cookiefile );
$xml_url_piece = explode( 'xmlSearch = "', $html );
$xml_url_piece_piece = explode( '"', $xml_url_piece[1] );
$xml_url = "http://downloadcenter.nikonimglib.com/" . $xml_url_piece_piece[0];
$products = simplexml_load_file( $xml_url );

unset($html);
unset($xml_url_piece);
unset($xml_url_piece_piece);
unset($xml_url);

foreach ($products->category as $category) {
    foreach ( $category->children() as $product ) {
        if( "" != $product['href'] ){
            $nikon[(string)$category['name']][] = (string)$product['href'];
        } else {
            $cat = (string)$product['name'];
            foreach ( $product->children() as $sub_product ) {
                $nikon[(string)$category['name']][$cat][] = (string)$sub_product['href'];
            }
        }

    }
}

// echo "<pre>";
// print_r($nikon);

foreach ($nikon as $key => $category) {
    echo "----------------" . $key . "----------------<br>";
    foreach ($category as $key => $product) {
        if (is_array($product)) {
            echo "----------------" . $key . "----------------<br>";
            foreach ($product as $key => $subproduct) {
                echo "http://downloadcenter.nikonimglib.com" . $subproduct . "<br>";
            }
        } else {
            echo "http://downloadcenter.nikonimglib.com" . $product . "<br>";
        }

    }
}