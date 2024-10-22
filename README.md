# BANRISUL-API-PIX PHP

## Introdução

O objetivo desta biblioteca é comunicar com a API-PIX implementada pelo Banrisul. Ela pode ser facilmente integrada ao seu software e/ou ERP.

## Como usar

**Instalação:**

Para utilizar a biblioteca através do Composer, execute:

```bash
composer require divulgueregional/api-banrisul

```

## Atualização:

Para atualizar a biblioteca, execute:

```bash
composer update
```

<b>Ou para atualizar para uma versão específica (última tag): </b>

```bash
composer update divulgueregional/api-banrisul 1.0.5
```

<b>Remover </b>

```bash
composer remove divulgueregional/api-banrisul
```

## Documentação:

Acesse a pasta docs e leia o README.md para mais detalhes.

## O QUE VOCÊ PODE UTILIZAR

<b>SEGURANÇA</b><br>

- Geraração de 5 arquivos (certificados)
- Gerar token.

<b>PIX-COB</b><br>

<!-- - Criar uma cobrança para pagamento imediato informando o TXID. (Falta fazer) -->

- Criar uma cobrança para pagamento imediato, com geração automática do TXID
- Recuperar os dados de uma cobrança para pagamento imediato.
- Gerar QRCode.
- WebHook: criar, consultar e excluir.
  <!-- - Consulta de lista de PIX Recebidos -->
  <!-- - Alterar ou remover uma cobrança para pagamento imediato. (Falta fazer) -->

<b>TESTAR CONEXAO COM A APLICAÇÃO</b><br>

```bash
require_once '../../vendor/autoload.php';
use Divulgueregional\ApiBanrisul\ApiBanrisul;

$api = new ApiBanrisul();
$response = $api->teste();
echo '<pre>';
print_r($response);
```

## Autor:

Roseno Matos (Developer) <br>
rosenomatos@gmail.com<br>

## Licença:

A BANRISUL-API-PIX é licenciado sob a Licença MIT (MIT). Você pode usar, copiar, modificar, integrar, publicar, distribuir e/ou vender cópias dos produtos finais, mas deve sempre declarar que Roseno Matos (rosenomatos@gmail.com) é o autor original destes códigos e atribuir um link para https://github.com/divulgueregional/api-banrisul

## Comunidade:

## Facilitou sua vida?

Se o projeto o ajudou em uma tarefa excencial a sua aplicação de uma forma simples e se gostaria de contribuir com uma pequena doação ao autor, faça pelo PIX abaixo<br><hr>

Chave Pix E-MAIL: roseno@divulgueregional.com.br
