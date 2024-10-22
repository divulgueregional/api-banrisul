# GERAR CERTIFICADO

## Certificado .pem

Gerar certificado PrivKey_ApiPix_Desenv.pem<br>

```bash
// Configuração da chave privada (2048 bits)
$private_key_config = array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

// Gerando o par de chaves (pode levar algum tempo)
$privkey = openssl_pkey_new($private_key_config);

if (!$privkey) {
    echo json_encode('Falha ao gerar chave privada: ' . openssl_error_string());
    die();
}

// Exportando a chave privada para o arquivo .pem com proteção por senha
$private_key_passphrase = "senha_forte";  // Escolha uma senha forte aqui
openssl_pkey_export($privkey, $private_key, $private_key_passphrase);

// Salvando a chave privada no arquivo .pem
file_put_contents("cert/PrivKey_ApiPix_Desenv.pem", $private_key);
```

## Certificado .txt

Gerar certificado CSR_ApiPix_Desenv.txt a ser enviar ao Banrisul<br>

```bash
// Configuração básica
$config = array(
    'private_key' => "cert/PrivKey_ApiPix_Desenv.pem",
    'csr' => "cert/CSR_ApiPix_Desenv.txt", // nome do arquivo para gerar txt
    'countryName' => 'BR',
    'commonName' => '99999999999999' // Aqui você coloca o CNPJ do cliente que vai gerar o pix
);

// Carrega a chave privada do arquivo .pem (se tiver senha, forneça no segundo parâmetro)
$private_key = file_get_contents($config['private_key']);
$privkey = openssl_pkey_get_private($private_key, "senha_forte");  // senha definida anteriormente

if (!$privkey) {
    echo json_encode('Falha ao carregar a chave privada: ' . openssl_error_string());
    die();
}

// Configuração do DN (Distinguished Name), incluindo o CNPJ no campo 'CN'
$dn = array(
    "countryName" => $config['countryName'],  // Código do país (C)
    "commonName" => $config['commonName'],    // CNPJ (CN)
);

// Cria o CSR com os campos configurados
$req = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));

if (!$req) {
    echo json_encode('Falha ao gerar o CSR: ' . openssl_error_string());
    die();
}

// Exporta o CSR para um arquivo
openssl_csr_export($req, $csr);
file_put_contents($config['csr'], $csr);
```

## Certificado .pfx

Banrisul enviara um certificado ArquivoRecebidoBanrisul.cer, agora pode gerar o arquivo .pfx

```bash
// Caminhos dos arquivos de entrada
$cert_file = "cert/ArquivoRecebidoBanrisul.cer";        // Certificado (.cer)
$private_key_file = "cert/PrivKey_ApiPix_Desenv.pem";  // Chave privada (.pem)
$pfx_output_file = "cert/PFX_ApiPix_Desenv.pfx";   // Arquivo de saída (.pfx)
$pfx_password = "senha_do_arquivo_pfx";   // Senha para proteger o arquivo .pfx

// Carrega o certificado .cer
$cert_content = file_get_contents($cert_file);
if (!$cert_content) {
    echo json_encode("Falha ao carregar o certificado.");
    die();
}

// Carrega a chave privada .pem
$private_key_content = file_get_contents($private_key_file);
$private_key = openssl_pkey_get_private($private_key_content, $pfx_password);  // Use a senha se a chave privada estiver protegida

if (!$private_key) {
    echo json_encode("Falha ao carregar a chave privada: " . openssl_error_string());
    die();
}

// Certificado precisa estar em formato X.509
$cert = openssl_x509_read($cert_content);
if (!$cert) {
    echo json_encode("Falha ao ler o certificado: " . openssl_error_string());
    die();
}

// Dados adicionais, como cadeia de certificados (opcional)
$additional_certs = null; // Caso tenha certificados adicionais, adicione aqui

// Gera o arquivo PKCS#12 (.pfx)
$success = openssl_pkcs12_export_to_file($cert, $pfx_output_file, $private_key, $pfx_password, array());

if ($success) {
    echo json_encode('ok');
} else {
    echo json_encode("Falha ao gerar o arquivo PFX: " . openssl_error_string());
}
```

## Certificado para usar na aplicação

API-PIX Banrisul necessita de certificado.pem e chave_privada_sem_senha.pem. Use o certificado.pfx

**Ler o arquivo .pfx e extrair o certificado cert.pem e chave_privada.pem**

```bash
$pfxFile = "cert/PFX_ApiPix_Desenv.pfx.pfx";
if (file_exists($pfxFile)) { // Caminho para o arquivo PFX
    $pfxPassword = 'senha_do_arquivo_pfx'; // Senha do arquivo PFX

    $pfxContent = file_get_contents($pfxFile); // Lê o arquivo PFX
    $certificates = [];

    // Extrai o certificado e a chave privada do PFX
    if (openssl_pkcs12_read($pfxContent, $certificates, $pfxPassword)) {
        $privateKey = $certificates['pkey']; // Chave privada
        $certificate = $certificates['cert']; // Certificado

        file_put_contents("cert/chave_privada.pem", $privateKey); // Salva a chave privada sem senha
        file_put_contents("cert/cert.pem", $certificate); // Salva o certificado em formato PEM

        print_r(json_encode('ok'));
    } else {
        echo json_encode('Erro ao ler o arquivo PFX.');
    }
} else {
    echo json_encode('certificado .pfx não encontrado!');
}
```

Com os arquivos certificado.pem e chave_privada_sem_senha.pem, agora pode usar na aplicação pra gerar o pix. Gere o token para testar se o certificado estão ok, deste que já tenha obtido CLIENT_ID e CLIENT_SECRET
