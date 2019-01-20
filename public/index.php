<?
$prices = [
    [
        'price' => 21999,
        'shop_name' => 'Shop 1',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21550,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21950,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21350,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21050,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ]
];

function ShellSort($elements) {
    $k=0;
    $length = count($elements);
    $gap[0] = (int) ($length / 2);

    while($gap[$k] > 1) {//1шаг O(N)
        $k++;
        $gap[$k]= (int)($gap[$k-1] / 2);
    }



    for($i = 0; $i <= $k; $i++){//2шага 0(N)
        $step = $gap[$i];


        for($j = $step; $j < $length; $j++) {// 2шага, 1шаг O(logN)
            $temp = $elements[$j];
            $p = $j - $step;

            while($p >= 0 && $temp['price'] < $elements[$p]['price']) {// 5шагов O(logN)
                $elements[$p + $step] = $elements[$p];
                $p = $p - $step;
            }

            $elements[$p + $step] = $temp;
        }
    }

    return $elements;
}

var_dump(ShellSort($prices));

//1
//Количество шагов 5

//2
//O (N + N*logN*logN) = O(N + N*log^2N)
//При N>2 O(N + N*log^2N) = O (N*log^2N)