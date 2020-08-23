<?php

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        //dd($data);

        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        require_once 'application/views/'.$template_view;
    }
}