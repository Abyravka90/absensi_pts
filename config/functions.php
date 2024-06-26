<?php 
    function compress_image($source_url, $destination_url, $quality){
    $info = getimagesize($source_url);

    if($info['mime']=='image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);

    //save it
    imagejpeg($image,$destination_url,$quality);

    //return destination file url
    return $destination_url;
}
?>