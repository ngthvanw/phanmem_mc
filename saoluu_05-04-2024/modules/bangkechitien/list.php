<?php
session_start();
function addList($addList)
{
    $sproducts = json_decode($_SESSION["Products"], true);
    //sort by product ID to get max ProductID
    usort($sproducts, function($a, $b)
    {
        return ($a["ProductID"] > $b["ProductID"]);
    });
    $max = $sproducts[sizeof($sproducts)-1]["ProductID"];

    //get $product by reference.
    foreach ($addList as $i=> &$product)
    {
        $product["ProductID"] = $max + 1 + $i;

        $sproduct = array();
        copyproduct($sproduct, $product);
        $sproducts[]=$sproduct;

        //$products[]=$product;//add new product
    }
    $_SESSION["Products"]= json_encode($sproducts);
    return $addList;
}
function copyproduct(&$sproduct, $uproduct){
    $sproduct["ProductID"] = $uproduct["ProductID"];
    $sproduct["ProductName"] = $uproduct["ProductName"];
    $sproduct["QuantityPerUnit"] = $uproduct["QuantityPerUnit"];
    $sproduct["UnitPrice"] = $uproduct["UnitPrice"];
    $sproduct["UnitsInStock"] = $uproduct["UnitsInStock"];
    //$product["UnitsOnOrder"] = $product2["UnitsOnOrder"];
    $sproduct["Discontinued"] = $uproduct["Discontinued"];
}
function updateList($updateList)
{
    $sproducts = json_decode($_SESSION["Products"], true);

    foreach ($updateList as $uproduct)
    {
        $ProductID = $uproduct["ProductID"];
        $found=false;
        foreach($sproducts as $i => &$sproduct){
            if($sproduct["ProductID"] == $ProductID){
                //$products[$i] = $product2;
                copyproduct($sproduct, $uproduct);
                $found=true;
                break;
            }
        }
        if(!$found){
            //add new product if not found.
            $sproduct = array();
            copyproduct($sproduct, $uproduct);
            $sproducts[]=$sproduct;
        }
    }
    $_SESSION["Products"]= json_encode($sproducts);
    return $updateList;
}
function deleteList($deleteList)
{
    $products = json_decode($_SESSION["Products"], true);

    foreach ($deleteList as $product)
    {
        $ProductID = $product["ProductID"];
        foreach($products as $i => $product2){
            if($product2["ProductID"] == $ProductID){
                unset($products[$i]);
                break;
            }
        }
    }
    $_SESSION["Products"]= json_encode($products);
    return $deleteList;
}
if( isset($_GET["pq_batch"]))
{
    session_start();
    $dlist = $_POST['list'];

    if(isset($dlist["updateList"])){
        $dlist["updateList"] = updateList($dlist["updateList"]);
    }
    if(isset($dlist["addList"])){
        $dlist["addList"] = addList($dlist["addList"]);
    }
    if(isset($dlist["deleteList"])){
        $dlist["deleteList"] = deleteList($dlist["deleteList"]);
    }

    echo json_encode($dlist);
}
else{
    session_start();
    $_SESSION["Products"]=null;
    $products = json_decode($_SESSION["Products"], true);
    $sb = "{\"data\":".json_encode($products)."}";
    echo $sb;
}

?>
