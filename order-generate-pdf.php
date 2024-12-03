<?php

require("fpdf/fpdf.php");

class PDF extends FPDF {
 
    function Header() {

        $topMargin = 9;   
        $sideMargin = 10; 

        $this->SetFillColor(20, 30, 60);  
        $this->Rect($sideMargin, $topMargin, $this->GetPageWidth() - 2 * $sideMargin, 22, 'F');  

        $this->Image('images/logo.png', $sideMargin, $topMargin + 3, 15); 

        $this->SetFont('playfairdisplay', 'BI', 20); 
        $this->SetTextColor(186, 173, 123); 

        $this->SetXY($sideMargin + 15, $topMargin + 3);  

        // Title "Cherubim of Heaven"
        $this->Cell(0, 10, 'Cherubim Of Heaven', 0, 1, 'L'); 

        $this->SetXY($sideMargin + 15, $this->GetY()+2);  
        $this->SetFont('montserrat', '', 12);
        $this->SetTextColor(255, 255, 255);

        $text = 'Funeral Service';
        $space = 4;  
        for ($i = 0; $i < strlen($text); $i++) {
            $this->Cell($space, 0, $text[$i], 0, 0, 'L');
        }
        $this->Ln(10);  

        $this->SetFont('montserrat', '', 7);  
        $this->SetTextColor(255, 255, 255); 

        $this->SetXY($this->GetPageWidth() - 120 - $sideMargin, $topMargin + 4);  

        $this->Cell(0, 8, 'Purok 4, San Pedro, Hagonoy, Bulacan, Philippines', 0, 1, 'R');
        $this->Cell(0, 5, 'Phone: +63 932 713 1818 | Tel: (044) 762 4284', 0, 1, 'R');

        $this->Ln(10); 
    }
}

// Initialize the PDF
$pdf = new PDF();
$pdf->AddFont('playfairdisplay', 'BI', 'PlayfairDisplay-BoldItalic.php'); 
$pdf->AddFont('montserrat', '', 'Montserrat-Regular.php');
$pdf->AddFont('montserrat', 'B', 'Montserrat-Bold.php'); 
$pdf->AddPage();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $service_id = $_POST['service_id'];
    $formatted_date = $_POST['formatted_date'];
    $service_status = $_POST['service_status'];

    $transaction_data = unserialize($_POST['transaction_data']);
    
    $totalAmount = $_POST['totalAmount'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $p_method = $_POST['p_method'];
    $barangay = $_POST['barangay'];
    $purok = $_POST['purok'];
    $h_num = $_POST['h_num'];
    $s_name = $_POST['s_name'];
    $full_name = $_POST['full_name'];

    if ($p_method == "COD") {
        $p_method = "Cash";
    }

    $pdf->SetFont('montserrat', 'B', 14); 
    $pdf->SetTextColor(20, 30, 60);
    $pdf->Cell(0, 15, 'Order Summary', 0, 1, 'C');

    $pdf->Ln(10);
    
    // Invoice Details
    $pdf->SetFont('montserrat', '', 10);
    $pdf->Cell(0, 5, 'Transaction No. ' . str_pad($service_id, 6, "0", STR_PAD_LEFT), 0, 1, 'L');
    $pdf->Cell(0, 5, 'Date: ' . $formatted_date, 0, 1, 'L');
    
    $pdf->Ln(10);

    // Billing Information
    $pdf->SetFont('montserrat', 'B', 12);

    $pdf->SetFillColor(20, 30, 60);  

    $pdf->SetDrawColor(200, 200, 200);

    $pdf->SetTextColor(186, 173, 123);  

    $pdf->Cell(0, 10, 'Billing Information', 1, 1, 'C', true); 

    $pdf->SetFont('montserrat', '', 10);
    $pdf->SetTextColor(0, 0, 0);  

    // Billing details
    $pdf->Cell(0, 7, 'Name: ' . $full_name, 1, 1, 'L');
    $pdf->Cell(0, 7, 'Contact: ' . $phone, 1, 1, 'L');
    $pdf->MultiCell(0, 7, 'Address: ' . $h_num . " " . $s_name . ", " . $purok . " " . $barangay . ", Hagonoy, Bulacan", 1, 'L');
    $pdf->Cell(0, 7, 'Email: ' . $email, 1, 1, 'L');

    $pdf->Ln(10);  // Adds extra space after the table
    
    // Transaction Table
    $pdf->SetFont('montserrat', 'B', 10);

    $pdf->SetFillColor(20, 30, 60);  

    $pdf->SetDrawColor(200, 200, 200);

    $pdf->SetTextColor(186, 173, 123);  

    $pdf->Cell(100, 10, 'Service Name', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Quantity/Days', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Unit Price', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Total', 1, 1, 'C', true);

    $pdf->SetTextColor(0, 0, 0);  

    $total = 0;
    foreach ($transaction_data as $transaction) {
        $mult = $transaction['Service_Price'] * $transaction['Number_of_Orders'];
        $total += $mult;

        $quantity_label = 'Quantity';
        $quantity_value = $transaction['Number_of_Orders'];

        if (stripos($transaction['Service_Name'], 'Venue') !== false) {
            $quantity_label = 'Days';
            $quantity_value = $totalAmount / $transaction['Service_Price'];
            $mult = $totalAmount;
        }

        if ($totalAmount > 99999) {
            $price_size = 9;
        }
        else {
            $price_size = 10;
        }
        
        $pdf->Cell(100, 8, $transaction['Service_Name'], 1, 0, 'L');
        $pdf->Cell(30, 8, $quantity_value, 1, 0, 'C');
        $pdf->SetFont('montserrat', 'B', $price_size);
        $pdf->Cell(30, 8, 'PHP ' . number_format($transaction['Service_Price'], 2), 1, 0, 'C');
        $pdf->Cell(30, 8, 'PHP ' . number_format($mult, 2), 1, 1, 'C');
    }

    $pdf->Ln(5);

    // Total Amount
    $pdf->SetFont('montserrat', 'B', 10);
    $pdf->Cell(160, 8, 'Total Amount', 1, 0, 'L');
    $pdf->SetFont('montserrat', 'B', $price_size);
    $pdf->Cell(30, 8, 'PHP ' . number_format($total, 2), 1, 1, 'C');
    $pdf->SetFont('montserrat', 'B', 10);
    $pdf->Cell(160, 8, 'Mode of Payment', 1, 0, 'L');
    $pdf->SetFont('montserrat', 'B', 10);
    $pdf->Cell(30, 8, $p_method, 1, 1, 'C');

     // Footer
     $pdf->Ln(10);
     $pdf->SetFont('montserrat', '', 10);
     $pdf->Cell(0, 7, 'Note: Thank you for trusting Cherubim of Heaven Memorial Park, Inc.', 0, 1);

    $pdf->Output();
}
?>
