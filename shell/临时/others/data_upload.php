
<?php
print_r($_FILES);
$addtime=date("Ymd",time());
$daydir='/data/userdata/'.$addtime;
if(file_exists($daydir)){
    echo "upload dir is ".$daydir."<br>";         
}else{
    mkdir($daydir,0777);
    echo $daydir." dir is created for upload.";
}
if(isset($_FILES['upload'])){
  @copy( $_FILES['upload']['tmp_name'], $daydir.'/'.$_FILES['upload']['name'] );
    @unlink( $_FILES['upload']['tmp_name'] );
	}else{
         echo "no file upload.";
        }
            
	?>
