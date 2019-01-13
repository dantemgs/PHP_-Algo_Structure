<?php
// Создаем новый объект DirectoryIterator
$dir = new DirectoryIterator("../");
// Цикл по содержанию директории
foreach ($dir as $item) {
    echo $item . "<br>";
}
