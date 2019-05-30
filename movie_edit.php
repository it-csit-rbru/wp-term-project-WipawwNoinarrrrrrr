<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261013</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include indivIDual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แก้ไขข้อมูลหนัง</h4>
                    <?php
                        $movie_id = $_REQUEST['movie_id'];
                        if(isset($_GET['submit'])){
                            $movie_id = $_GET['movie_id'];
                            $movie_name = $_GET['movie_name'];
                            $movie_time = $_GET['movie_time'];
                            $movie_Detail = $_GET['movie_Detail'];
                            $movie_Resolution_id = $_GET['movie_Resolution_id'];
                            $sql = "update movie set ";
                            $sql .= "movie_name='$movie_name',movie_Resolution_id='$movie_Resolution_id',movie_id='$movie_id',movie_time='$movie_time',movie_Detail='$movie_Detail'";
                            $sql .="where movie_id='$movie_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลหนัง  เรียบร้อยแล้ว<br>";
                            echo '<a href="movie_list.php">แสดงรายชื่อหนังทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="movie_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="movie_id" class="col-md-2 col-lg-2 control-label">รหัสหนัง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_id" ID="movie_id" class="form-control" 
                                       value="<?php echo $movie_id;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <input type="hIDden" name="Resolution_id" ID="Resolution_id" value="<?php echo "$movie_id";?>">
                            <label for="movie_Resolution_id" class="col-md-2 col-lg-2 control-label">ความละเอียด</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="movie_Resolution_id" ID="movie_Resolution_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from resolution where movie_id='$Resolution_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $movie_id = $_row2['movie_id']; 
                                    $movie_Resolution_id = $row2['movie_Resolution_id'];
                                    $movie_name = $_row2['movie_name'];
                                    $movie_time = $_row2['movie_time'];
                                    $movie_Detail = $_row2['movie_Detail'];
                                    $sql =  "SELECT * FROM resolution order by Resolution_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Resolution_id'].'"';
                                        if($row['Resolution_id']==$movie_Resolution_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['Resolution_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_name" class="col-md-2 col-lg-2 control-label">ชื่อหนัง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_name" ID="movie_name" class="form-control" 
                                       value="<?php echo $movie_name;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="movie_time" class="col-md-2 col-lg-2 control-label">เวลาหนัง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="movie_time" ID="movie_time" class="form-control" 
                                       value="<?php echo $movie_time;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_Detail" class="col-md-2 col-lg-2 control-label">เรื่องย่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_Detail" ID="movie_Detail" class="form-control" 
                                       value="<?php echo $movie_Detail;?>">
                            </div>    
                        </div>  
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะคอมพิวเตอร์ศึกษาปี 2 </address>
            </div>
        </div>    
    </body>
</html>