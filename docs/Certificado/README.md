# GERAR CERTIFICADO

## Introdução

API-PIX Banrisul necessita de certificado.pem e chave_privada_sem_senha.pem. Pode ser gerado através do certificado.pfx

**Ler o arquivo .pfx e extrair o certificado e chave privada:**

```bash
$pfxFile = 'banrisul.pfx'; // Caminho para o arquivo PFX
$pfxPassword = 'senha123'; // Senha do arquivo PFX

$pfxContent = file_get_contents($pfxFile);// Lê o arquivo PFX
$certificates = [];

// Extrai o certificado e a chave privada do PFX
if (openssl_pkcs12_read($pfxContent, $certificates, $pfxPassword)) {
    $privateKey = $certificates['pkey']; // Chave privada
    $certificate = $certificates['cert']; // Certificado

    file_put_contents('chave_privada_sem_senha.pem', $privateKey);// Salva a chave privada sem senha
    file_put_contents('certificado.pem', $certificate);// Salva o certificado em formato PEM

    echo "Certificado e chave privada gerados com sucesso!";
} else {
    echo "Erro ao ler o arquivo PFX.";
}
```
