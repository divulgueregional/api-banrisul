# PIX BANRISUL

## Introdução

Seguir as etapas:<br>
1- O Cliente deve ir ao Banrisul pedir o pix a ser integrado no sistema da software House e o cliente deve passa o e-mail da integradora ao Banrisul.<br>
2- A software House receberá um e-mail com workflow. Cada cliente terá seu Workflow. Esse número é para facilitar o acompanhamento interno do Banrisul.<br>
3- Recebendo o workflow enviar um e-mail para api@banrisul.com.br no assunto colocar o número do workflow e em anexo colocar o arquivo no formato .CSR vinculado ao CNPJ do cliente.<br>

Segue os comandos para gerar o CSR utilizando a ferramenta openssl pelo terminal<br>

- Gerar par de chaves RSA

```bash
openssl genrsa -aes256 -out PrivKey_ApiPix_Desenv.pem 2048
```

Observações: <br>
O nome do arquivo “.pem” (PrivKey_ApiPix_Desenv.pem) é de escolha do cliente.<br>
Será solicitada uma senha, que será utilizada nas etapas posteriores.<br>

- Gerar CSR<br>
  Execute o seguinte comando no terminal:<br>

```bash
openssl req -new -key PrivKey_ApiPix_Desenv.pem -subj
“/C=BR/CN=99999999999999” -out CSR_ApiPix_Desenv.txt -sha256
```

Observações:<br>
O campo CN deve conter o CNPJ da empresa.<br>
Deve ser informada a mesma senha da etapa anterior.<br>
O nome do CSR (CSR_ApiPix_Desenv.txt) é de escolha do cliente.<br>
Recomendamos a extensão .txt para envio através de e-mail.<br>
O arquivo CSR_ApiPix_Desenv.txt é o único arquivo que precisa ser enviado ao Banrisul.<br>
Todo esse processo poderá ser feito em php.<br>
<br>
4- Banrisul mandará um e-mail com um arquivo .cer para gerar o arquivo em .pfx.<br>
Execute o seguinte comando no terminal:<br>

```bash
openssl pkcs12 -export -in MTLS-H-99999999999999-20240216.cer -inkey
PrivKey_ApiPix_Desenv.pem -out PFX_ApiPix_Desenv.pfx
```

Observações:<br>
Deve ser informada a mesma senha da etapa anterior.<br>
O nome do arquivo .cer (MTLS-H-99999999999999-20240216.cer) é definido pelo Banrisul.<br>
O nome do .pfx (PFX_ApiPix_Desenv.pfx) é de escolha do cliente.<br>
<br>
5- O arquivo .pfx deverá ser usado na aplicação da API do Banrisul para gerar o pix.<br>
Gere os 2 arquivos .pem<br><br>

## Gerar Client Client Secret

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
