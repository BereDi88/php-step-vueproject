<?php


$array=['str1'=>25,'str2'=>44];

function toArray($firstArg,$secondArg):array {
    return[
        $firstArg=>$secondArg
    ];
}

print_r(toArray(11,22));
//echo 'Hello vargant VM';

//$array=[
//    1,
//    ['str1','str2','str3'],
//    5,
//    5,
//    9,
//    'string'];

//for ($i=0, $c=count($array),$i<$c,$i++ )
//{
//
//}
//foreach ($array as $key =>$value){
//    $serializedValue=[];
//
//    if (is_array($value)){
//        $newValue= serialize($value);
//        print_r($newValue);
//    }
//else {
//    print_r($value);
//    echo  '<br>';
//    print_r($key);
//    echo  '<br>';
//    echo  '<br>';
//}
//
//}

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.08.2018
 * Time: 14:42
 */