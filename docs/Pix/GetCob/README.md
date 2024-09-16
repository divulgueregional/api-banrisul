# GET-COB

## Introdução

Buscar um pix pelo txid.

```bash
require_once '../../vendor/autoload.php';

use Divulgueregional\ApiBanrisul\ApiBanrisul;

$config = [
    "CLIENT_ID" => 'l79ed82e84df794382a060fe403d1d5d14',
    "CLIENT_SECRET" => '6d6acba5ab9a4be690050d1a3607e6bd',
    "CERTIFICADO" => __DIR__ . '/certificado.pem',
    "CHAVE_PRIVADA" => __DIR__ . '/chave_privada_sem_senha.pem',
    "TOKEN" => '',
];


// dados do pix
$txid = '';// obrigatório - txid gerado ao criar o pix

$api = new ApiBanrisul($config, $tpAmb = 2);
$response = $api->getCob($txid);
echo '<pre>';
print_r($response);
```

**Sugestão**

- guarde txid para futuras consultas.<br>
- guarde pixCopiaECola para gerar o QRCOde ou dar a opção de pixCopiaECola.<br>
