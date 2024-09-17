# COB

## Introdução

Cob: gera um pix a ser pago.

```bash
require_once '../../vendor/autoload.php';

use Divulgueregional\ApiBanrisul\ApiBanrisul;

$config = [
    "CLIENT_ID" => 'l79ed82e84df794382a060fe403d1d5d14',
    "CLIENT_SECRET" => '6d6acba5ab9a4be690050d1a3607e6bd',
    "CERTIFICADO" => __DIR__ . '/certificado.pem',
    "CHAVE_PRIVADA" => __DIR__ . '/chave_privada_sem_senha.pem',
    "TOKEN" => '',// se não informar vai gerar automático
];


// dados do pix
$dadosPix = [
    "chave_pix" => '',// obrigatório - gerado na conta Banrisul
    "valor" => '23.00',// obrigatório - valor do pix
    "devedorNome" => null,
    "devedorCpf" => null,
];

$api = new ApiBanrisul($config, $tpAmb = 2);// produção: retire $tpAmb = 2
$response = $api->cob($dadosPix);
echo '<pre>';
print_r($response);
```

**Sugestão**

- guarde txid para futuras consultas.<br>
- guarde pixCopiaECola para gerar o QRCOde ou dar a opção de pixCopiaECola.<br>
