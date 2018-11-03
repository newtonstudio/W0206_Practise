<table border="1px" style="text-align:center">
    <?php 
        $abd = array(
            0 => array("id"=>1,"title"=>"iPhone","price"=>3600),
            1 => array("id"=>2,"title"=>"Samsung","price"=>2500),
            2 => array("id"=>3,"title"=>"HTC","price"=>1566),
        );

        foreach($abd as $a){ ?>
            <tr>
                <td style="background-color:red" width="200px"><?=$a['id']?></td>
                <td style="background-color:blue" width="200px"><?=$a['title']?></td>
                <td style="background-color:green" width="200px"><?=$a['price']?></td>
            </tr>
        <?php }
        
    ?>

</table>