<?php
    require_once('config.php');
?>

<div class="halaman">
    <table border: 1px solid black; padding: 15px; >
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
        </tr>
        <?php 
            $query = mysqli_query($connect,"Select * from users");

            if(mysqli_num_rows($query) > 0 ){
                $counter = 1;

                while ($row = mysqli_fetch_array($query)) {
                    $values[] = array(
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'username' => $row['username'],
                        'counter' => $counter
                    );
                    $counter++;
                }
                foreach($values as $v){
                    echo '
                    <tr>
                        <td>'.$v['counter'].'</td>
                        <td>'.$v['first_name'].' '.$v['last_name'].'</td>
                        <td>'.$v['username'].'</td>
                    </tr>
                    ';
                }
            }else{
                echo ' <td colspan="3">Record not Found</td> ';
            }
        ?>
    </table>
    <br>
</div>