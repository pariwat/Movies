<?php

require_once './MovieService.php';

$ms = new MovieService();

$list = $ms->movies();
//echo var_dump($list);
//echo $list;
for($i=0;$i<sizeof($list);$i++)
{
    $r = new stdClass();
    $r = $list[$i];
    echo $r->thumbnail.'<br>';
}

