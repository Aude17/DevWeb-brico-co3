<h1> Du HTML </h1>
<?php 
echo "<h1> Un simple test php </h1>";
echo 'bonjour';
$x=67;
$y=45;
$s=$x+$y;
echo "ok";
echo " La somme de ".$x." et ".$y." = ".$s;

?>
<button> Un bouton </button>
<?php
echo "Suite php";

?>

<?php
function somme($x, $y){
    $s=$x+$y;
    return $s;
}
function fact($n){
$f=1;
for ($i=1;$i<=$n;$i++){$f=$f*$i;}
return $f;
}
?>

<?php
echo fact(4);
?>