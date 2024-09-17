# WEBHOOK

## Introdução

Receber notificação via webhoob, para isso precisa criar um webHook.<br>
webHook tem 3 endpoint: criar, consultar e deletar.<br>

**ChamarApi**

```bash
require_once '../../vendor/autoload.php';
use Divulgueregional\ApiBanrisul\ApiBanrisul;

$config = [
    "CLIENT_ID" => '', // obrigatorio
    "CLIENT_SECRET" => '', // obrigatorio
    "CERTIFICADO" => __DIR__ . '/certificado.pem',
    "CHAVE_PRIVADA" => __DIR__ . '/chave_privada_sem_senha.pem',
    "TOKEN" => '',
];

$api = new ApiBanrisul($config, $tpAmb = 2);// produção: retire $tpAmb = 2
```

**Criar**

- crie um webHook.

```bash
$chave_pix = '';// chave pix criada no Banrisul
$webhookUrl = "https://seu_dominio.com.br/api/banrisul/webhook";
$response = $api->webhook($chave_pix, $webhookUrl);
echo '<pre>';
print_r($response);
```

**Consultar**

- consultar um webHook.

```bash
$chave_pix = '';// obrigatorio - chave pix criada no Banrisul
$response = $api->getWebhook($chave_pix);
echo '<pre>';
print_r($response);
```

**Deletar**

- excluir um webHook.

```bash
$chave_pix = '';// chave pix criada no Banrisul
$response = $api->deleteWebhook($chave_pix);
echo '<pre>';
print_r($response);
```
