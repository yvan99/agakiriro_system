<?php
# GENERATE USERS CODE

function codeGenerator()
{

    $randNumbers   = '1234567890';
    $shufleNumbers = str_shuffle($randNumbers);
    $generateCode  = substr($shufleNumbers, 0, 8);

    return $generateCode;
}

