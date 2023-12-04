<?php

function convertTimeStampTodate($str)
{
    return date("F j, Y, g:i a", strtotime($str));
}


