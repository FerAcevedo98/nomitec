<?php
    require ('../../backend/sesiones/validarsesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/home.css">
    <link href="../../open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Nomitec | Ver Usuario</title>
    <style>
        body {
            background-image: url('/nomitec/resources/home.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <?php
        include ('../../layouts/menu.php');
        $id=$_GET['id'];                        
        include ('../conexionmysql.php');
        $query="SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));               
            $obj=mysqli_fetch_array($result);
            $id=$obj['id'];                                     
            $user=$obj['user'];
            $pass=$obj['pass'];
            $rol=$obj['rol'];
        mysqli_close($connection);
    ?>
<div class="jumbotron mx-5">       
    <div class="row justify-content-start">
        <form action="usuarios.php">
            <button class="ml-5 btn btn-info" type="submit">Regresar</button>                
        </form>
    </div>
            <br>
    <div class="row justify-content-center border border-primary rounded bg-primary">            
                <h3>Usuario: <?php echo $id; ?> </h3>             
    </div>
    <div class="container-fluid justify-content-center border border-primary rounded">   
                <div class="row justify-content-center">
                    <div class="col justify-content-center">
                        <br>
                        <h3><span class="oi oi-book"></span>Datos del Usuario</h3>          
                    </div>                            
                </div>     
                <div class="row">                    
                    <div class="col-6 form-group">                                            
                        <div class="form-group">
                            <label for="user">user</label>
                            <input type="text" name="user" class="form-control text-center" value="<?php echo $user; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="rol">Nivel del Usuario</label>
                            <select class="form-control" name="rol" disabled>
                                    <option><?php 
                                    include ('../conexionmysql.php');
                                    $query="SELECT * FROM rol WHERE id='$rol'";
                                    $res=mysqli_query($connection,$query);
                                    $array=mysqli_fetch_array($res);
                                    echo $array['name'];
                                    ?></option>                           
                            </select>
                        </div>
                        <?php mysqli_close($connection); ?>p
                        <div class="form-group">
                            <label for="pass">Contrasena</label>                        
                            <input type="password" name="pass" class="form-control text-center" value="<?php echo $pass ?>" disabled>
                        </div>
                    </div><br>                    
                </div> 
    </div>               
</div>
<?php
    include ('../../layouts/footer.php');
?>
</body>
</html>