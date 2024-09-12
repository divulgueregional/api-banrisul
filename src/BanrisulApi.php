<?php

namespace Divulgueregional\apibanrisul;

class BanrisulApi
{
    protected $urls;
    function __construct($tpAmb = 1)
    {
        // Definindo URL para o ambiente de produção
        $this->urls = 'https://mtls-api.banrisul.com.br';

        // Se o ambiente não for de produção (tpAmb != 1), define homologação
        if ($tpAmb != 1) {
            $this->urls = 'https://mtls-api-h.banrisul.com.br';
        }
    }

    public function teste()
    {
        return 123;
    }
}
