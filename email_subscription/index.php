<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subscription Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="show-btn"> Show Modal</label>
        <div class="wrapper">
            <label for="toggle" class="cancel-btn"><i class="fas fa-times"></i></label>
            <div class="icon"><i class="far fa-envelope"></i></div>
            <div class="content">
                <header>Seja um Assinante</header>
                <p>Inscreva-se em nosso blog e receba novidades.</p>
            </div>
            <form action="index.php" method="POST">
                <?php
                    $userEmail = "";
                    if(isset($_POST['inscrever'])){
                        $userEmail = $_POST['email'];
                        if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
                            $subject = "Obrigado por se inscrever";
                            $message = "Obrigado por se inscrever em nosso blog. Você receberá todas as novidades. Nós não compartilhamos ou vendemos suas informações, aproveite o blog com toda a segurança e sem preocupação!!";
                            $sender = "From: ThiagoLopesAlmeida1230@gmail.com";
                            if(mail($userEmail, $subject, $message, $sender)){
                                ?>
                                <div class="alert success">Obrigado por inscrever-se</div>
                                <?php
                                $userEmail = "";
                            }else{
                                ?>
                                <div class="alert error">Falha ao enviar seu email!!</div>
                                <?php
                            }
                        }else{
                            ?>
                            
                            <div class="alert error"><?php echo $userEmail;?> não é um email válido</div>
                            <?php
                            
                        }
                    }
                ?>
                <div class="field">
                    <input type="text" placeholder="Email" name="email" required value="<?php echo $userEmail;
                    ?>">
                </div>
                <div class="field btn">
                    <input type="submit" name="inscrever" value="Inscreva-se"> 
                </div>
            </form>
            <div class="text">
                Suas informações estão seguras.
            </div>
        </div>
    </body>
</html>