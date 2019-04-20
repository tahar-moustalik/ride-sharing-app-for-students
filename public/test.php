<?php 

if(isset($_POST["ref"])){
$ref = $_POST["ref"];
$data = explode('-',$ref);
$str = "";
for($i= 0;$i<count($data);$i++){
    if($i == count($data) -1){
         $tmp = explode(',',$data[$i]);
     $str .= "codecmd=".$tmp[1] ."\n";
    }
    else {
 $tmp = explode(',',$data[$i]);
 $str .= "reference ". $tmp[0] . "qte" . $tmp[1] ."\n";
    }


}
echo $str;
}

else{
echo "nothing";
}
?>