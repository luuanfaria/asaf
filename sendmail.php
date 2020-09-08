<?php
if (isset($_POST['enviarSimulacao'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome = $_POST['name'];
 $cpf = $_POST['cpf'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone']; 
 $celular = $_POST['celular'];
 $valor = $_POST['valor'];
 $parcelas = $_POST['parcelas'];
 $valorb = $_POST['valorb'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente = "site@asafconsigbrasil.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario = "emprestimo@asafconsigbrasil.com.br"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = "Simulacao do site - $nome "; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome: $nome \n"; 
 $email_conteudo = "CPF: $cpf \n"; 
 $email_conteudo .= "Email: $email \n";
 $email_conteudo .= "Telefone: $telefone / $celular \n"; 
 $email_conteudo .= "Valor: $valor em $parcelas \n"; 
 $email_conteudo .= "Outro Valor: $valorb \n"; 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if(mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
  echo "<script>window.location='index.html';alert('$nome, sua mensagem foi enviada com sucesso! Em breve um de nossos consultores entrará em contato. Obrigado por escolher Asaf Consig Brasil');</script>";
 }else {
  echo "<br><br><center><b><font color='red'>Ocorreu um erro ao enviar a mensagem, verifique os dados preenchidos ou entre em contato!";
 };
 //====================================================
} 
?>