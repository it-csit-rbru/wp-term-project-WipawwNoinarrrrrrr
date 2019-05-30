<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project 6015261013</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
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
                <h4>เพิ่มสถานะ</h4>    
                <?php
                    if(isset($_GET['submit'])){
                            $movie_id = $_GET['movie_id'];
                            $movie_Resolution_id = $_GET['movie_Resolution_id'];
                            $movie_name = $_GET['movie_name'];
                            $movie_time = $_GET['movie_time'];
                            $movie_Detail = $_GET['movie_Detail'];
                        $sql = "insert into movie"; 
                        $sql .= "values ('$movie_id','$movie_Resolution_id','$movie_name','$movie_time','$movie_Detail')";
                        include 'connectdb.php';
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มสถานะ เรียบร้อยแล้ว<br>";
                        echo '<a href="movie_list.php">แสดงสถานะทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="movie_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="movie_id" class="col-md-2 col-lg-2 control-label">ลำดับ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_id" id="movie_id" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_name" class="col-md-2 col-lg-2 control-label">ชื่อหนัง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_name" id="movie_name" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_time" class="col-md-2 col-lg-2 control-label">เวลาหนัง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_time" id="movie_time" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_Detail" class="col-md-2 col-lg-2 control-label">เรื่องย่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="movie_Detail" id="movie_Detail" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="movie_Resolution_id" class="col-md-2 col-lg-2 control-label">รายละเอียด</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="movie_Resolution_id" id="movie_Resolution_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM resolution order by Resolution_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Resolution_id'] . '">';
                                        echo $row['Resolution_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
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