<?php

function curlup($url) {

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    curl_close($curl);
    return $result;
}

function section($string) {
    $url = 'https://www.reddit.com/r/'.$string.'.json?limit=11';
    $data = curlup($url);

    $data = json_decode($data);
    $children = $data->data->children;

    $div = '';

    foreach ($children as $child ) {
        $div .= '<div class=\'story\'>';
        if (!($child->data->thumbnail == 'self' || $child->data->thumbnail == 'nsfw' || $child->data->thumbnail == 'default')) {
        $div .= '<img src=\''.$child->data->thumbnail.'\'>';
        } else {
        $div .= '<img src=\'./images/noimage.png\' title=\'No Image\'>'; }
        $div .= '<h3><a href=\''.$child->data->url.'\' target=\'_blank\'>'.$child->data->title.'</a></h3></div>';
    }  
    $div .= '</div>';
    echo $div;
}

if (basename($_SERVER['PHP_SELF']) == 'videos.php') {

        section('videos');

} else if (basename($_SERVER['PHP_SELF']) == 'pics.php') {

        section('pics');

} else if (basename($_SERVER['PHP_SELF']) == 'index.php') {

        section('politics');

} else if (basename($_SERVER['PHP_SELF']) == 'funny.php') {

        section('funny');
}

?>