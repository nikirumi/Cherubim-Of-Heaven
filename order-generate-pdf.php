<?php
// Include the FPDF library
require("fpdf/fpdf.php");

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $service_id = $_POST['service_id'];
    $formatted_date = $_POST['formatted_date'];
    $service_status = $_POST['service_status'];
    
    // Unserialize the transaction_data array
    $transaction_data = unserialize($_POST['transaction_data']);
    
    $totalAmount = $_POST['totalAmount'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $p_method = $_POST['p_method'];
    $barangay = $_POST['barangay'];
    $purok = $_POST['purok'];
    $h_num = $_POST['h_num'];
    $s_name = $_POST['s_name'];

    // Check if the payment method is COD
    if($p_method == "COD") {
        $p_method = "Cash";
    }

    // Create a new FPDF instance and generate the PDF
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->SetAutoPageBreak(true, 15);
    $pdf->AddPage();
    
    // Company Logo/Header Section
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTextColor(31, 97, 141);  // Dark Blue
    $pdf->Cell(0, 20, 'INVOICE', 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, 'Cherubim of Heaven Memorial Park, Inc.', 0, 1, 'L');
    
    // Invoice Details
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 7, 'Transaction No. ' . str_pad($service_id, 6, "0", STR_PAD_LEFT), 0, 1, 'R');
    $pdf->Cell(0, 7, 'Date: ' . $formatted_date, 0, 1, 'R');
    
    $pdf->Ln(10);
    
    // Billing Information
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(0, 10, 'Billing Information', 1, 1, 'L', true);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(95, 7, 'Name: ' . $s_name, 1, 0, 'L');
    $pdf->Cell(95, 7, 'Contact: ' . $phone, 1, 1, 'L');
    $pdf->Cell(95, 7, 'Address: ' . $barangay . " " . $purok . " " . $h_num, 1, 0, 'L');
    $pdf->Cell(95, 7, 'Email: ' . $email, 1, 1, 'L');
    
    $pdf->Ln(10);
    
    // Transaction Table
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(100, 10, 'Item Description', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Unit Price', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Total', 1, 1, 'C', true);
    
    $pdf->SetFont('Arial', '', 10);
    $total = 0;
    foreach ($transaction_data as $transaction) {
        $mult = $transaction['Service_Price'] * $transaction['Number_of_Orders'];
        $total += $mult;
        
        $pdf->Cell(100, 8, $transaction['Service_Name'], 1, 0, 'L');
        $pdf->Cell(30, 8, $transaction['Number_of_Orders'], 1, 0, 'C');
        $pdf->Cell(30, 8, 'PHP ' . number_format($transaction['Service_Price'], 2), 1, 0, 'R');
        $pdf->Cell(30, 8, 'PHP ' . number_format($mult, 2), 1, 1, 'R');
    }
    
    // Total Row with matching font size
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(160, 10, 'Total Amount', 1, 0, 'R');
    $pdf->Cell(30, 10, 'PHP ' . number_format($total, 2), 1, 1, 'R');
    
    // Footer
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 7, 'Payment Method: ' . $p_method, 0, 1);
    $pdf->Cell(0, 7, 'Note: Thank you for choosing Cherubim of Heaven Memorial Park, Inc!', 0, 1);
    
    // Output the PDF to the browser
    $pdf->Output();
}
?>