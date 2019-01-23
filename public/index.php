<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'algo3');

if (mysqli_connect_errno()) {
    echo 'Не удалось бодключиться к бд';
    exit();
};

function getCountCategories($link)
{
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_all($result, 1);
    $result = count($result);
    return $result;
}

function getDb($parId, $link)
{
    $sql = "SELECT c.idx, c.name, cl.parent_id, cl.child_id, cl.level
FROM `categories` AS `c`
INNER JOIN `connection` AS `cl` ON `c`.`idx` = `cl`.`child_id`
WHERE `cl`.`parent_id` = {$parId}";

    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_all($result, 1);

    return $result;
}

function myFunc($link, $catalog, $result = '')
{
    if (!empty($catalog)) {
        $result .= "<ul>";
        $result .= "<li>{$catalog[0]["name"]}";
        $count = count($catalog);
        for ($i = 2; $i <= $count; $i++) {
            $dir = getDb($catalog[$i - 1]["idx"], $link);
            if (!empty($dir)) {
                $result .= myFunc($link, $dir);
            } else {
                $result .= "<li>{$catalog[$i-1]["name"]}</li>";
            }

        }
        $result .= "</ul>";

    }

    return $result;
}

$catalog = getDb(1, $link);
//var_dump($catalog);
//echo "<hr>";
//$catalog = getDb(2, $link);
//var_dump($catalog);
//echo "<hr>";
//$catalog = getDb(3, $link);
//var_dump($catalog);
//echo "<hr>";
//$catalog = getDb(4, $link);
//var_dump($catalog);
//echo "<hr>";
//$catalog = getDb(5, $link);
//var_dump($catalog);
//echo "<hr>";
//$catalog = getDb(3, $link);
//var_dump($catalog);
//echo "<hr>";

//echo myFunc($link, $catalog);
echo "<hr>";
//
//2
//

$words = [
    0 => 'lol',
    1 => 'lok',
    2 => 'adasd',
    3 => 'adsdqf',
    4 => 'poop',
];

function checkWords($words, $result = '')
{
    foreach ($words as $word) {
        $left = 0;
        $right = strlen($word) - 1;
        $center = round(strlen($word) / 2, 0, PHP_ROUND_HALF_UP);

        if (checkPalindrome($word, $left, $right, $center)) {
            $result .= "$word - полиндром<br>";
        } else {
            $result .= "$word - не является полиндромом<br>";
        }


    }
    return $result;
}

function checkPalindrome($word, $left, $right, $center)
{
    if ($word[$left] != $word[$right]) {
        return false;
    } else if ($left >= $center) {
        return true;
    } else {
        $left++;
        $right--;
        return checkPalindrome($word, $left, $right, $center);
    }
}


echo checkWords($words);


