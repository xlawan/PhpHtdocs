<?php
    use \setasign\Fpdi\Fpdi;

    require_once('vendor/setasign/fpdf/fpdf.php');
    require_once('vendor/autoload.php');

    // initiate FPDI
    $pdf = new Fpdi();
    // add a page
    $pdf->AddPage();
    // set the source file
    $pdf->setSourceFile("EMORPH_ReimbursementChecklist_AnnexE2_09212022.pdf");
    // import page 1
    $tplIdx = $pdf->importPage(1);
    // use the imported page and place it at point 10,10 with a width of 100 mm
    $pdf->useImportedPage($tplIdx, 0, 0, 210);

    // now write some text above the imported page
    $pdf->SetFont('Arial','B','12');

    // Set the signature image file path
    $signature1 = __DIR__.'/images/signature1.png';
    $signature2 = __DIR__.'/images/signature2.png';
    $signature3 = __DIR__.'/images/signature3.png';


    // Case No. _______________  
    $pdf->SetXY(47, 49);
    $pdf->Write(0, '2023-123456789');

    // HEALTH FACILITY (HF)  
    $pdf->SetXY(32, 63);
    $pdf->Write(0, 'St. Luke\'s Medical Center');
    
    // ADDRESS OF HF  
    $pdf->SetXY(32, 72);
    $pdf->Write(0, '279 E Rodriguez Sr. Ave, Quezon City, Metro Manila');

    // A PATIENT
    // 1. Last Name, First Name, Middle Name, Suffix
    $pdf->SetXY(60, 81);
    $pdf->Write(0, 'Santos, Juan, Dela Cruz, Jr.');
    // SEX
    $pdf->SetXY(146.5, 80);
    $pdf->Write(0, '/');
    $pdf->SetXY(162, 80);
    $pdf->Write(0, '/');
    
    // 2. PhilHealth ID Number
    $pdf->SetXY(107, 86);
    $pdf->Write(0, '1   2      3  4  5   6  7   8  9  0   1      2');
    
    // B. MEMBER
    // 1. Last Name, First Name, Middle Name, Suffix
    $pdf->SetXY(60, 102);
    $pdf->Write(0, 'Santos, Juan, Dela Cruz, Jr.');
    
    // 2. PhilHealth ID Number
    $pdf->SetXY(107, 107.5);
    $pdf->Write(0, '1   2      3  4  5   6  7   8  9  0   1      2');
    
    // CHECKLIST OF REQUIREMENTS FOR REIMBURSEMENT (TRANCHE 2) Expanded ZMORPH
    // 1. Checklist of Requirements for Reimbursement (Annex E.2-EMORPH)
    $pdf->SetXY(168, 133.5);
    $pdf->Write(0, '/');
    // 2. Photocopy of approved Pre –Authorization Checklist & Request (Annex A-EMORPH) 
    $pdf->SetXY(168, 140);
    $pdf->Write(0, '/');
    // 3. Photocopy of completely accomplished ME FORM (Annex B) 
    $pdf->SetXY(168, 147);
    $pdf->Write(0, '/');
    // 4. Original or certified true copy of the Statement of Account (SOA) 
    $pdf->SetXY(168, 151.5);
    $pdf->Write(0, '/');
    // 5. Properly accomplished PhilHealth Claim Form (CF) 1 or PhilHealth Benefit Eligibility Form (PBEF) and CF 2  
    $pdf->SetXY(168, 158);
    $pdf->Write(0, '/');
    // 6. Discharge Checklist for Expanded ZMORPH (Tranche 2) (Annex C.2- EMORPH)  
    $pdf->SetXY(168, 167);
    $pdf->Write(0, '/');
    // 7. Photocopy of completed Z Satisfaction Questionnaire (Annex D)  
    $pdf->SetXY(168, 174);
    $pdf->Write(0, '/');

    // Certified correct by: 
    $pdf->SetXY(50, 187.5);
    $pdf->Write(0, 'DR. MARIA REYES');
    // Signature
    $pdf->Image($signature1,55, 176, 26, 13);
    // PhilHealth Accreditation No
    $pdf->SetXY(52, 207);
    $pdf->Write(0, '1 2  3 4    5 6  7 8 9 0  1    2');
    // Date signed (mm/dd/yyyy)
    $pdf->SetXY(75, 215);
    $pdf->Write(0, '05/06/2023');

    // Certified correct by: 
    $pdf->SetXY(125, 187.5);
    $pdf->Write(0, 'DR. JOSE SANTOS');
    // Signature
    $pdf->Image($signature2,130, 176, 26, 13);
    // PhilHealth Accreditation No
    $pdf->SetXY(126, 207);
    $pdf->Write(0, '1  2 3 4    5  6  7 8 9 0 1     2');
    // Date signed (mm/dd/yyyy)
    $pdf->SetXY(150, 215);
    $pdf->Write(0, '05/06/2023');

    // Conforme by:
    $pdf->SetXY(125, 228);
    $pdf->Write(0, 'JUAN SANTOS');
    // Signature
    $pdf->Image($signature3,130, 218, 26, 13);
    // Date signed (mm/dd/yyyy)
    $pdf->SetXY(150, 242);
    $pdf->Write(0, '05/06/2023');


    $pdf->Output();
?>