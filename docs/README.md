# PIX BANRISUL

## Introdução

Seguir as etapas:<br>
1- O Cliente deve ir ao Banrisul pedir o pix a ser integrado no sistema da software House e o cliente deve passa o e-mail da integradora ao Banrisul.<br>
2- A software House receberá um e-mail com workflow. Cada cliente terá seu Workflow. Esse número é para facilitar o acompanhamento interno do Banrisul.<br>
3- Recebendo o workflow enviar um e-mail para api@banrisul.com.br no assunto colocar o número do workflow e em anexo colocar o arquivo no formato .CSR vinculado ao CNPJ do cliente.<br>

PDF com instruções do Banrisul:
[Geração de Arquivo CSR](https://github.com/divulgueregional/api-banrisul/tree/main/docs/Geração%20de%20Arquivo%20CSR.pdf)

<br>
5- Com o arquivo .pfx deverá gerar os 2 arquivos .pem para usar nessa aplicação e gerar o pix<br><br>

## Credenciais: Client_Id e Client_Secret

Para gerar as credenciais (Client_Id e Client_Secret), acesse o Portal do Desenvolvedor Banrisul (https://developers.banrisul.com.br/).<br>
• Informe os dados de usuário e senha.<br>
• Selecione o Menu superior Manage >> Applications.<br>
• Clique sobre a aplicação MERCADO MISSIONEIRO LTDA.<br>
• Clique no botão Actions >> Edit Application (no lado direito da tela).<br>
• No menu lateral esquerdo, clique no item Key.<br>
• Clique no botão Request New Secret.<br>
• Guarde o novo Client_Secret e clique no botão Save, na parte inferior da tela.<br>
<br><br>
Importante: a credencial será gerada com situação “pendente”. Portanto, deverá ser encaminhado e-mail para api@banrisul.com.br solicitando a liberação da credencial.
