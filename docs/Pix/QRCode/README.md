# QRCODE

## Mostrar QRCode na tela

Para mostrar QRCode na tela foi usado o "endroid/qr-code": "^4.6".<br>
caso instalar uma versão superior use um código mais atualizado

```bash
require_once '../../pacotes/vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$writer = new PngWriter();

$qrPIX = '';// colocar [pixCopiaECola]

$qrCode = new QrCode($qrPIX);
$qrCode->setSize(120);
$qrCode->setMargin(0);
$result = $writer->write($qrCode);
```

**Colocar na tela**

<img src="<?= $result->getDataUri() ?>" alt="QR Code Pix" />
