<?php session_start(); include("functions_store.php");
if(isset($_SESSION['type_user'])){
    if($_SESSION['type_user'] == "dev"){ ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="assets/css/my_publishs.css">
            <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
            <title>CONEC.T Store - Minhas publicações</title>
        </head>
        <body>
            <?php include("navTop_store.php"); ?>
            <h2>Seus produtos</h2>
            
            <?php
                if(isset($_GET['prog'])){
                    apagar_programa();
                }

                $query = mysqli_query($conexao, "SELECT * FROM software_store WHERE id_dev = ".$_SESSION['id_dev']."");
                if($linhas = mysqli_num_rows($query) > 0){          
                    echo "<ul>";     
                        
                    $i = 0;     
                    while($load = mysqli_fetch_assoc($query) and $i++ < 5){                                                                                                             
                        echo "<li><a href='app_select.php?prog=".$load['id']."'><img src='icons_store/".$load['icone']."' id='icone'/><br><p> ".$load['title']."</p><p>".$load['plataforma']."<br>".$load['preco']."</p><br></a><a href='my_publishs.php?prog=".$load['id']."' data-confirm='Tem certeza que deseja excluir o item selecionado?'>Apagar</a></li>";      
                    }  
                    echo "</ul>";  
                }else{
                    echo"Você não tem publicações";
                }
                ?>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

            <script type="text/javascript" src="assets/js/functions.js"></script>
        </body>
    </html>
<?php 
    }else{
        header("Location: ./index_store.php");     
    }
} ?>