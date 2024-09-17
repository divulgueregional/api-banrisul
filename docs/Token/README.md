# GERAR O TOKEN

## Introdução

API-PIX Banrisul necessita que seja gerado um token.

**Para onter o token:**

```bash
require_once '../../vendor/autoload.php';

use Divulgueregional\ApiBanrisul\ApiBanrisul;

$config = [
    "CLIENT_ID" => 'xx5588x55xx55888x5555x',
    "CLIENT_SECRET" => 'sss5558855s2222s22ssss22',
    "CERTIFICADO" => __DIR__ . '/certificado.pem',
    "CHAVE_PRIVADA" => __DIR__ . '/chave_privada_sem_senha.pem',
];
$api = new ApiBanrisul($config);// produção - para homologção: ApiBanrisul($config, $tpAmb = 2);

$response = $api->gerarToken();
echo '<pre>';
print_r($response);
```
