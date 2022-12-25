<?php
session_start();

require  '../assets/vendor/autoload.php';
require_once("../assets/controller/dbcontroller.php");
$db_handle = new DBController();
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\RawbtPrintConnector;
use Mike42\Escpos\CapabilityProfile;


if (!empty($_GET["ref"])) {
    $ref = $_GET["ref"];
    $result = $db_handle->runQuery("SELECT * FROM pesanan WHERE ref='$ref'");

    $date = $result[0]["timedate"];
    $tprice = $result[0]["tprice"];

    $cashier = $_SESSION["username"];

}

try {
    $profile = CapabilityProfile::load("POS-5890");

    /* Fill in your own connector here */
    $connector = new RawbtPrintConnector();

    
    /* Information for the receipt */
    // $items = array(
    //     new item("Example itasdasdasdasdasdasem #1", "4.00"),
    //     new item("Another thing", "3.50"),
    //     new item("Something else", "1.00"),
    //     new item("A final item", "4.45"),
    // );
    // $subtotal = new item('Subtotal', '12.95');
    $header = new item('Qty','Name', 'TPrice');
    $header2 = new item('','', '(RM)');

    $test = new item('1','item la gila', '1.30');
    /* Date is kept the same for testing */
// $date = date('l jS \of F Y h:i:s A');

    /* Start the printer */
    $logo = EscposImage::load("assets/img/awbtlogo.png", false);
    $printer = new Printer($connector, $profile);


    /* Print top logo */
    if ($profile->getSupportsGraphics()) {
        $printer->setJustification(Printer::JUSTIFY_CENTER);

        $printer->graphics($logo);
    }
    if ($profile->getSupportsBitImageRaster() && !$profile->getSupportsGraphics()) {
        $printer->setJustification(Printer::JUSTIFY_CENTER);

        $printer->bitImage($logo);

    }

    /* Name of shop */
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $printer->text("TAIPING YONG TAU FOO\n");
    $printer->selectPrintMode();
    $printer->text("4,5,6 PUSAT PENJAJA\nBELAKANG BOMBA TAIPING\n34700 TAIPING, PERAK");
    $printer->feed();


    /* Title of receipt */
    $printer->setEmphasis(true);
    $printer->text("CASH SALE\n\n");
    $printer->setEmphasis(false);

    /* Items */
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->setEmphasis(true);
    $printer->text("Bill No:" . $ref . "\n");
    $printer->text("Date:" . $date . "\n");
    $printer->text("Cashier:" . $cashier . "\n\n");

    $printer->setEmphasis(false);
    
    // foreach ($items as $item) {

    //     $printer->text($item->getAsString(32)); // for 58mm Font A
    // }
    
    $printer->setEmphasis(true);
    $printer->text($header->getAsString(32));

    $printer->text($header2->getAsString(32));

    $printer->setEmphasis(false);

    $printer->textRaw(str_repeat(chr(196), 32).PHP_EOL);

    $printer->setJustification(Printer::JUSTIFY_RIGHT);


    foreach ($result as $order) {

        $namelist = json_decode($order["name"]);
        $quantitylist = json_decode($order["quantity"]);
        $pricelist = json_decode($order["price"]);
        $quantityrow = 0;

        foreach ($namelist as $name) {


            $printer->text(new item($quantitylist[$quantityrow],$name, number_format($quantitylist[$quantityrow] * $pricelist[$quantityrow],2)));

            ++$quantityrow;

        }
        $printer->feed(2);
        $total = new item2('Total', number_Format($order['tprice'],2), true);

     $printer->text($total->getAsString(32));

    }

    $printer->feed();
    $printer->selectPrintMode();

    /* Tax and total */
    // $printer->text($tax->getAsString(32));
    $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    // $printer->text($total->getAsString(32));
    $printer->selectPrintMode();

    /* Footer */
    $printer->feed(2);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Thank you for dining\n");
    $printer->text("at Taiping Yong Tau Foo\n");

    $printer->feed(2);
    // $printer->text($date . "\n");







    /* Cut the receipt and open the cash drawer */
    $printer->cut();

} catch (Exception $e) {
} finally {
    $printer->close();
}

/* A wrapper to do organise item names & prices into columns */

class item
{
    private $name;
    private $price;

    private $qty;

    private $dollarSign;

    public function __construct($qty = '',$name = '', $price = '', $dollarSign = false)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
        $this->dollarSign = $dollarSign;
    }

    public function getAsString($width = 48)
    {
        $rightCols = 8;
        $leftCols = 18;
        $leftColsa = 5;

        $lefta = str_pad($this->qty, $leftColsa);

        $left = str_pad($this->name, $leftCols);

        $right = str_pad($this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$lefta$left$right\n";
    }



    public function __toString()
    {
        return $this->getAsString();
    }

}
class item2
{
    private $name;
    private $price;

    private $qty;

    private $dollarSign;

    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this->name = $name;
        $this->price = $price;
        $this->dollarSign = $dollarSign;
    }

    public function getAsString($width = 48)
    {
        $rightCols = 10;
        $leftCols = $width - $rightCols;
        if ($this->dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this->name, $leftCols);

        $sign = ($this->dollarSign ? 'RM ' : '');
        $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }



    public function __toString()
    {
        return $this->getAsString();
    }

}
