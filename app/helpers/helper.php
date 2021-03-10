<?php
function is_active($url)
{
    return request()->segment(2) != null && request()->segment(2) == $url ? 'active':'';
}