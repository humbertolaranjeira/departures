<?php

function getDayOffWeek(){
    date('w'); //gets day of week as number(0=sunday,1=monday...,6=sat)

    //note:returns 0 through 6 but as string so to check if monday do this:

    switch (date('w')) {
        case 0:
            $day_of_week = "Domingo";
            break;
        case 1:
            $day_of_week = "Segunda-Feira";
            break;
        case 2:
            $day_of_week = "Terça-Feira";
            break;
        case 3:
            $day_of_week = "Quarta-Feira";
            break;
        case 4:
            $day_of_week = "Quinta-Feira";
            break;
        case 5:
            $day_of_week = "Sexta-Feira";
            break;
        case 6:
            $day_of_week = "Sábado";
            break;
        default:
            break;
    }
    return $day_of_week;
}

function getDateNow(){
    $today = date("Y-m-d H:i:s");
    
    //horário Verão
    //$date = new DateTime($today, new DateTimeZone('GMT+1'));
    
    //horário Inverno
    $date = new DateTime($today, new DateTimeZone('GMT'));
    $date->setTimezone(new DateTimeZone(date_default_timezone_get()));
    return $date->format('Y-m-d H:i:s');
}

function getDateRange(){
    // get today date
    $today = date("Y-m-d H:i:s");
    // set new datetime timezone
    // set timezone= Europe/Lisbon on php.ini

    //horário Verão
    //$date = new DateTime($today, new DateTimeZone('GMT+1'));
    
    //horário Inverno
    $date = new DateTime($today, new DateTimeZone('GMT'));

    // get time zone
    $date->setTimezone(new DateTimeZone(date_default_timezone_get()));
    // horario - 1 min
    //$horario_min = strtotime($date->format('H:i')) - 60*1;
    // horario - 0 min
    $horario_min = strtotime($date->format('H:i'));
    // set horario_min format
    $interval['min'] = strftime('%H:%M', $horario_min);
    
    // horario + 20 min
    $horario_max = strtotime($date->format('H:i')) + 60*20;
    // set horario_min format
    $interval['max'] = strftime('%H:%M', $horario_max);
   
    return $interval;

}

