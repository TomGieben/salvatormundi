<?php

use App\Models\Text;

  function text(){
    $text = Text::all();
    $items = [];

    foreach($text as $item) {
        $items[$item->slug] = $item->text;
    }

    return $items;
  }
 
