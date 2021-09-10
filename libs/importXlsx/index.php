<?php
require_once 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

try{
    $connection = new PDO('mysql:host=localhost;dbname=u28496_tools;charset=utf8', 'root', '');
}catch(PDOException $ex){
    throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
}


if ( $xlsx = SimpleXLSX::parse('price.xlsx') ) {
    
    $mainGroupId =0;
    $subGroupId =0;

   
    $arr=[];

    foreach($xlsx->rows() as $row){
        
        if ($row[1] ==="Группа" ){
            
          
            $stmt = $connection->prepare("INSERT INTO `main_group` (`title`) VALUES  (:title)");            
            $stmt->execute([':title'=>$row[0]]);

            $mainGroupId = $connection->lastInsertId();

            echo " <h3>Группа $row[0] добавлена в БД. </h3>";

        }elseif(empty($row[1])){       
            
            $stmt = $connection->prepare("INSERT INTO `sub_group` (`title`,`maingroup_id`) VALUES (:title, :mainGroup)");
            $stmt->execute([':title'=> $row[0], ':mainGroup'=>  $mainGroupId]);

            $subGroupId = $connection->lastInsertId();

            echo "<h4>Под - Группа $row[0] добавлена в БД. </h4>";
            
        }else{
           
            $stmt = $connection->prepare("INSERT INTO `items` 
            (`vendor`, `maingroup_id`, `subgroup_id`, `item`, `price`, `pur_price`, `description`, `old_price`) VALUES 
            (:vendor,  :mainGroup,     :subGroup,     :item,  :price,  :pur_price, 'Описания нет', :old_price )"); 

            $stmt->execute([
                ':vendor'=>$row[1], 
                ':mainGroup'=> $mainGroupId, 
                ':subGroup'=>$subGroupId,
                ':item'=>$row[0], 
                ':price'=>$row[2],
                ':pur_price'=>$row[2],
               
                ':old_price'=>$row[2],                                        
            ]);         
                echo "<p>товар $row[0] добавлен  </p>";
        }
      
    }

    echo "<h2> Готово </h2>";

    /*echo "<pre>";
	print_r( $xlsx->rows() );
    echo "</pre>";*/
} else {
	echo SimpleXLSX::parseError();
}