# GERAR O PIX

## Introdução

API-PIX implementada pelo Banrisul. Os endpoints da API são definidos relativos aos diferentes servidores, existindo os servidores para homologação e produção. Com o certificado da empresa ".pfx" deve gerar 2 certificados ".pem".<br>

O token poderá armazenar e colocar no config ou a aplicação irá gerar automaticamente o token.<br>
O ambiente já está configurado para produção, para usar em homologação deve passar $tpAmb = 2.

**endpoints da API-PIX:**

- cob: Gerar um pix.
- getCob: Consultar um pix.
- QRCode: colocar um QRCode na tela.
- getWebhook: receber notificação de transação pix.
