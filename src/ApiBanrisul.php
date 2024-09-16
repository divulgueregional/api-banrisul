<?php

namespace Divulgueregional\ApiBanrisul;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiBanrisul
{
    protected $config;
    protected $url;
    protected $client;
    protected $token;
    function __construct($config = [], $tpAmb = 1)
    {
        $this->config = $config;
        // Definindo URL para o ambiente de produção
        $this->url = 'https://mtls-api.banrisul.com.br';

        // Se o ambiente não for de produção (tpAmb != 1), define homologação
        if ($tpAmb != 1) {
            $this->url = 'https://mtls-api-h.banrisul.com.br';
        }

        $this->client = new Client([
            'base_uri' => $this->url,
        ]);

        // startar o token
        if (isset($this->config['TOKEN'])) {
            if ($this->config['TOKEN'] != '') {
                $this->setToken($this->config['TOKEN']);
            } else {
                $token = $this->gerarToken();
                $this->setToken($token);
            }
        }
    }

    #################################################
    ###### TOKEN ####################################
    #################################################
    public function gerarToken()
    {
        try {
            $response = $this->client->request(
                'POST',
                '/auth/oauth/v2/token',
                [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Basic ' . base64_encode($this->config['CLIENT_ID'] . ':' . $this->config['CLIENT_SECRET']) . ''
                    ],
                    'cert' => $this->config['CERTIFICADO'],
                    'ssl_key' => $this->config['CHAVE_PRIVADA'],
                    'verify' => false,
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'scope' => 'cob.read cob.write'
                    ]
                ]
            );
            $retorno = json_decode($response->getBody()->getContents());
            if (isset($retorno->access_token)) {
                $this->token = $retorno->access_token;
            }
            return $this->token;
        } catch (\Exception $e) {
            return new Exception("Falha ao gerar Token: {$e->getMessage()}");
        }
    }

    public function setToken(String $token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    #################################################
    ###### FIM TOKEN ################################
    #################################################

    #################################################
    ###### PIX ######################################
    #################################################

    // Gerar Pix
    public function cob($dadosPix)
    {
        try {
            $response = $this->client->request(
                'POST',
                '/pix/api-mtls/cob',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => "Bearer {$this->token}",
                    ],
                    'cert' => $this->config['CERTIFICADO'],
                    'ssl_key' => $this->config['CHAVE_PRIVADA'],
                    'verify' => false,
                    'json' => [
                        'chave' => $dadosPix['chave_pix'],
                        'valor' => [
                            'original' => $dadosPix['valor']
                        ],
                        'calendario' => [
                            'expiracao' => 86400
                        ],
                        'devedor' => [
                            'nome' =>  $dadosPix['devedorNome'],
                            'cpf' =>  $dadosPix['devedorCpf']
                        ],
                    ],
                ]
            );
            $retorno = json_decode($response->getBody()->getContents());
            return $retorno;
        } catch (\Exception $e) {
            return new Exception("Falha ao gerar Pix: {$e->getMessage()}");
        }
    }

    public function getCob($txid)
    {
        try {
            $response = $this->client->request(
                'GET',
                "/pix/api-mtls/cob/{$txid}",
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => "Bearer {$this->token}",
                    ],
                    'cert' => $this->config['CERTIFICADO'],
                    'ssl_key' => $this->config['CHAVE_PRIVADA'],
                    'verify' => false, // Verificar se necessário
                ]
            );
            $retorno = json_decode($response->getBody()->getContents());
            return $retorno;
        } catch (\Exception $e) {
            return new Exception("Falha ao buscar Pix: {$e->getMessage()}");
        }
    }

    #################################################
    ###### TESTE ####################################
    #################################################
    public function teste()
    {
        return 'Teste OK';
    }
}
