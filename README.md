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
composer update divulgueregional/api-banrisul 1.0.4
```

<b>Remover </b>

```bash
composer remove divulgueregional/api-banrisul
```

## Documentação:

Acesse a pasta docs e leia o README.md para mais detalhes.

## O QUE VOCÊ PODE UTILIZAR

<b>SEGURANÇA</b><br>

- Gerar certificado .pem através do cerificado .pfx
- Gerar token.

<b>PIX-COB</b><br>

<!-- - Criar uma cobrança para pagamento imediato informando o TXID. (Falta fazer) -->

- Criar uma cobrança para pagamento imediato, com geração automática do TXID
- Alterar ou remover uma cobrança para pagamento imediato. (Falta fazer)
- Recuperar os dados de uma cobrança para pagamento imediato. (Falta fazer)
- Consultar lista de cobranças imediatas. (Falta fazer)

<b>TESTAR APLICAÇÃO</b><br>

```bash
require_once '../../vendor/autoload.php';
use Divulgueregional\ApiBanrisul\ApiBanrisul;


$api = new ApiBanrisul();
$response = $api->teste();
echo '<pre>';
print_r($response);
```

<!-- <b>PIX-COBV</b><br>

- Criar uma cobrança com vencimento. (Falta fazer)
- Alterar ou remover uma cobrança com vencimento. (Falta fazer)
- Recuperar os dados de uma cobrança com vencimento. (Falta fazer)
- Consultar lista de cobranças com vencimento. (Falta fazer) -->

<!-- <b>PIX-LOTECOBV</b><br>

- Criar/Alterar lote de cobranças com vencimento. (Falta fazer)
- Utilizado para revisar cobranças específicas dentro de um lote de cobranças. (Falta fazer)
- Consultar um lote específico de cobranças com vencimento. (Falta fazer)
- Consultar lotes de cobrança com vencimento. (Falta fazer) -->

<!-- <b>PIX-LOC</b><br>

- Criar uma location de payload. (Falta fazer)
- Recuperar os dados de uma location. (Falta fazer)
- Consultar locations cadastradas. (Falta fazer)
- Desvincular uma cobrança de uma location. (Falta fazer) -->

<!-- <b>PIX-PIX</b><br>

- Consultar Pix. (Falta fazer)
- Consultar Pix recebidos. (Falta fazer)
- Solicitar devolução. (Falta fazer)
- Consultar devolução. (Falta fazer) -->

<!-- <b>PIX-WEBHOOK</b><br>

- Configurar um webhook para notificação de PIX recebido, para uma chave DICT do recebedor. (Falta fazer)
- Consultar o webhook cadastrado para uma chave DICT do recebedor. (Falta fazer)
- Consultar os webhooks cadastrados para o recebedor. (Falta fazer)
- Remover o webhook cadastrado para uma chave DICT do recebedor. (Falta fazer) -->

## Autor:

Roseno Matos (Developer) <br>
rosenomatos@gmail.com<br>

## Licença:

A BANRISUL-API-PIX é licenciado sob a Licença MIT (MIT). Você pode usar, copiar, modificar, integrar, publicar, distribuir e/ou vender cópias dos produtos finais, mas deve sempre declarar que Roseno Matos (rosenomatos@gmail.com) é o autor original destes códigos e atribuir um link para https://github.com/divulgueregional/api-banrisul

## Comunidade:

## Facilitou sua vida?

Se o projeto o ajudou em uma tarefa excencial a sua aplicação de uma forma simples e se gostaria de contribuir com uma pequena doação ao autor, faça pelo PIX abaixo<br><hr>

Chave Pix E-MAIL: roseno@divulgueregional.com.br
