<?php
    require_once '../vendor/autoload.php';

    $pdf = new \FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Hello World!');

    use setasign\FpdiProtection\FpdiProtection;
    use setasign\StreamReader\StreamReader;

    // Open the PDF file and read its contents
    $pdfContents = file_get_contents('Dolloso_Paul-Albert_The-Medical-Scenario.pdf');

    // Create a new instance of the FpdiProtection class
    $pdf = new FpdiProtection();

    // Set the PDF file as the source for the FpdiProtection object
    $pdf->setSourceFile(StreamReader::createByString($pdfContents));

    // $pdf = new FpdiProtection();
    // $pdf->setSourceFile('Dolloso_Paul-Albert_The-Medical-Scenario.pdf');
    // $pageCount = $pdf->getPdfParser()->getPageCount();

    $certificateFile = 'path/to/my_certificate.p12';
    $certificatePassword = 'my_password';
    $signatureFieldName = 'Signature';
    $reason = 'I am the author of this document';
    $location = 'California';

    $pdf->setSignatureFieldName($signatureFieldName);
    $pdf->addSignatureField([
        'x' => 10,
        'y' => 10,
        'w' => 100,
        'h' => 50,
        'page' => $pageCount
    ]);

    $pdf->setSignatureParams(
        $certificateFile,
        $certificatePassword,
        '',
        '',
        '',
        $reason,
        $location
    );
    $pdf->Output('signed_document.pdf', 'F');
    
?>