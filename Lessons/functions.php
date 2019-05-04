<?php

//Die and dump function for debugging
function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}