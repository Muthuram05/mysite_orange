<html>
    <head>
        <title>
            search
        </title>
    </head>
    <body>
        <h1>
            searching
        </h1>
        <div class="container">
            <form method="POST">
                <input type="text" name="Email" placeholder="enter id">
                <input type="submit" name="search" value="search by id">

            </form>
            <table>
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>firstpassward</th>
                    <th>secondpassward</th>
                </tr>
                <?php   
                    $host="localhost";
                    $dbusername="root";
                    $dbpassward="";
                    $dbname="demo";
                $con=new mysqli($host,$dbusername,$dbpassward,$dbname);

                if(isset($_POST['search']))
                {
                    $Email=$_POST['Email'];
                    $query="SELECT * FROM mytable where Email='$Email' ";
                    $run=mysqli_query($con,$query);

                    while($row = mysqli_fetch_array($run)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['Uname']?></td>
                            <td><?php echo $row['Email']?></td>
                            <td><?php echo $row['passward1']?></td>
                            <td><?php echo $row['passward2']?></td>


                        </tr>


<?php
                    }
                }
                ?>



?>
            </table>
        </div>
    </body>
</html>