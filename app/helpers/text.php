<?php

use App\Models\Text;

  function text(){
    $text = Text::all();
    $items = [];

    foreach($text as $item) {
        $items['text'][$item->slug] = $item->text;
        $items['title'][$item->slug] = $item->name;
    }

    return $items;
  }
 
