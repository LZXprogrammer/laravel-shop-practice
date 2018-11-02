<?php

// 此方法用来测试 helpers.php 有没有被正常引用，目前无其他作用
function test_helper() {
    return 'OK';
}

// 将当前请求的路由名称转换为 CSS 类名称
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}