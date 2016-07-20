<?php

/**
 *  adapter wrapper
 *
 *  объединение двух не совместимых интерфейсов
 *
 */

interface MediaPlayer{

    function play($type,$name);

}

interface SuperMediaPlayer{

    function playOgg($name);
    function playMP4($name);

}


class OggPlayer implements SuperMediaPlayer{
    function playOgg($name)
    {
        echo 'paly OGG '.$name.PHP_EOL;
    }
    function playMP4($name)
    {
        // TODO: Implement playMP4() method.
    }
}

class Mp4Player implements SuperMediaPlayer{
    function playOgg($name){

    }
    function playMP4($name)
    {
        echo 'paly MP4 '.$name.PHP_EOL;
    }
}

//////////ADAPTER

class MediaAdaprter implements MediaPlayer{

    private $superMediaPlayer;

    function __construct($type)
    {

        switch ($this){
            case 'OGG': $this->superMediaPlayer = new OggPlayer(); break;
            case 'MP4': $this->superMediaPlayer = new Mp4Player(); break;
        }
    }

    function play($type, $name)
    {
        var_dump($type);
        var_dump($name);
        switch ($type){
            case 'OGG': $this->superMediaPlayer->playOgg($name); break;
            case 'MP4': $this->superMediaPlayer->playMP4($name); break;
        }
    }

}


class AudioPlayer implements  MediaPlayer{
    private $mediaAdapter;
    function play($type, $name)
    {
        switch ($type){
            case 'WAV': echo "play wav $name".PHP_EOL; break;
            case 'MP3': echo "play mp3 $name".PHP_EOL; break;
            case 'OGG':
            case 'MP4': $this->mediaAdapter = new MediaAdaprter($type);
                        $this->mediaAdapter->play($type,$name);
        }
    }
}

$p = new AudioPlayer();
$p->play('WAV','Song1');
$p->play('MP3','Song2');
$p->play('OGG','Song3');
$p->play('MP4','Song4');