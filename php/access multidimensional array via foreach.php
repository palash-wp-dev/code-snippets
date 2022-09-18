<?php 

// accessing values of first array from a multidimensional array
$humans = [
    'men'=>[
        'adult'=>30,
        'mid_age'=>60,
        'child'=>0
    ],
    'women'=>[
        'adult'=>20,
        'mid_age'=>10,
        'child'=>10
    ],
];

foreach($humans as $human){
    foreach($human as $men_key=>$men_value){
        echo 'key: '.$men_key.' value: '.$men_value.'<br>';
    }

    $count = count($human);
    if( $count >= 1 ){
            break;
    }
}
?>

<!-- Accessing another multidimensional array -->
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }
    div:nth-child(odd) {
        background: cyan;
        height: 200px;
        width: 400px;
        display: inline-block;
    }
    div:nth-child(even) {
        background: blue;
        height: 200px;
        width: 400px;
        display: inline-block;
    }
    div h2 {
        color: white;
        text-align: center;
        margin: 20px 0;
    }
    div li {
        list-style: none;
        color: black;
        text-align: center;
        margin-bottom: 10px;
        font-size: 18px;
    }
</style>
</head>
<body>

<?php 
$productlist = [
    'our_themes' => [
        'Bizlooks', 'Woolen', 'Karton'
    ],
    'our_plugins' => [
        'WCone', 'FoodBook', 'retroFood'
    ]
];

foreach( $productlist as $product_key => $product_value ){
   
    $new_key = str_replace("_"," ",$product_key);
    $new_cap_key = ucwords($new_key);
         
        echo '<div><h2>'.$new_cap_key.'</h2>';
        echo '<ul>';

        $number = 0;
        foreach( $product_value as $pro_key => $pro_value ){
                $number++;
                 echo '<li>'.$number.'. '.$pro_value.'</li>';
                 
        }

        echo '</ul></div>';
}

// printing this value -> $array = [ 18=>3, 19=>4, 20=>5, 21=>6, 22=>7 ];
// 1 way
$number = range(3,7);
$number2 = range(18,22);
$new_array = array_combine($number,$number2);
print_r ($new_array);
// another way
for( $i = 18, $j = 3; $i <= 22, $j <=7; $i++, $j++ ) {
    $array_key[] = $i;
    $array_value[] = $j;
}
$new_array=array_combine($array_key,$array_value);
print_r($new_array);
?>