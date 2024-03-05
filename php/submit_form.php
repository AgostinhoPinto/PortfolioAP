<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Verifica se todos os campos foram preenchidos
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem'])) {
    // Verifica se os campos não estão vazios
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['mensagem'])) {
        // Verifica se o email é válido
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $nome = $_POST['nome'];
            $mensagem = $_POST['mensagem'];
            $email = $_POST['email'];

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projetoportfolioap@gmail.com';
            $mail->Password = 'vmyo hfhl lldm hjqb';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->isHTML(true);

            $mail->Subject = 'Mensagem de ' . $nome;
            $mail->Body = 'Nome: ' . $nome . '<br>';
            $mail->Body .= 'Email: ' . $email . '<br>';
            $mail->Body .= 'Mensagem: ' . $mensagem;

            $mail->setFrom($email, $nome);
            $mail->addAddress('projetoportfolioap@gmail.com', 'Portfolio');

            if (!$mail->send()) {
                echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
            } else {
                echo 'E-mail enviado com sucesso!';
            }
        } else {
            echo 'Por favor, insira um endereço de e-mail válido.';
        }
    } else {
        echo 'Todos os campos são obrigatórios.';
    }
}
?>