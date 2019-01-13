<?
function task1($patch)
{
    $dir = new DirectoryIterator("{$patch}");


    foreach ($dir as $item) {
        if ($item->isDot()) {
            continue;
        }
        if ($item->isDir()) {
            echo "<li>{$item}<ul>";
            task1($item->getPathname());
            echo "</ul></li>";
        } else {
            echo "<li>{$item}</li>";
        }


    }

}

$patch = '../test';
task1($patch);
//
//
//
echo "<hr>";
//
//
//
function task2($arr)
{
    echo executeForeach($arr);
    echo executeIteration($arr);
}

function executeForeach($arr)
{
    $t1 = microtime();

    $str = '';
    $sum = null;

    foreach ($arr as $item) {
        $sum .= $item;
    }

    $t2 = microtime();

    $time = myTime($t1, $t2);
    $str .= "{$time}<br>";
    return $str;
}

function executeIteration($arr)
{
    $t1 = microtime();

    $str = '';
    $sum = null;
    $obj = new ArrayObject($arr);
    $iter = $obj->getIterator();

    while ($iter->valid()) {
        $sum .= $iter->current();
        $iter->next();
    }

    $t2 = microtime();

    $time = myTime($t1, $t2);
    $str .= "{$time}<br>";
    return $str;

}

function myTime($arg1, $arg2)
{
    return abs($arg1 - $arg2);
}

$count = pow(10, 5);
$arr = array_fill(0, $count, '254');
task2($arr);
echo "<br>";

$count = pow(10, 6);
$arr = array_fill(0, $count, '254');
task2($arr);
echo "<br>";

$count = pow(10, 6);
$arr = array_fill(0, $count, '254');
task2($arr);
echo "<br>";