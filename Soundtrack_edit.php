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
                <h4>แก้ไขข้อมูลเพศ</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $Soundtrack_id     = $_GET['Soundtrack_id'];
                        $Soundtrack_name   = $_GET['Soundtrack_name'];
                        $sql        = "update soundtrack set Soundtrack_name='$Soundtrack_name' where Soundtrack_id='$Soundtrack_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มคำนำหน้า $Soundtrack_name เรียบร้อยแล้ว<br>";
                        echo '<a href="Soundtrack_list.php">แสดงเพศทั้งหมด</a>';
                    }else{
                        $fSoundtrack_id = $_REQUEST['Soundtrack_id'];
                        $sql =  "SELECT * FROM soundtrack where Soundtrack_id='$fSoundtrack_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fSoundtrack_name = $row['Soundtrack_name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="Soundtrack_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="Soundtrack_id" id="Soundtrack_id" value="<?php echo "$fSoundtrack_id";?>">
                        <div class="form-group">
                            <label for="Soundtrack_name" class="col-md-2 col-lg-2 control-label">เพศ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="Soundtrack_name" id="Soundtrack_name" class="form-control" value="<?php echo "$fSoundtrack_name";?>">
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