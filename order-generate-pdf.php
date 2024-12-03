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
    $full_name = $_POST['full_name'];

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
    $pdf->Cell(0, 20, 'ORDER SUMMARY', 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, 'Cherubim of Heaven Memorial Park, Inc.', 0, 1, 'C');

    // Adding address and contact details
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 7, 'Purok 4, San Pedro, Hagonoy, Bulacan, Philippines', 0, 1, 'C');
    $pdf->Cell(0, 7, 'Phone: +63 932 713 1818 | Tel: (044) 762 4284', 0, 1, 'C');

    $pdf->Ln(10); // Adds 10mm vertical space
    
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
    $pdf->Cell(0, 7, 'Name: ' . $full_name, 1, 1, 'L');
    $pdf->Cell(0, 7, 'Contact: ' . $phone, 1, 1, 'L');
    $pdf->MultiCell(0, 7, 'Address: ' . $h_num . " " . $s_name . ", " . $purok . " " . $barangay . ", Hagonoy, Bulacan", 1, 'L');
    $pdf->Cell(0, 7, 'Email: ' . $email, 1, 1, 'L');
    
    $pdf->Ln(10);
    
    // Transaction Table
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(100, 10, 'Purchase Description', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Quantity/Days', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Unit Price', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Total', 1, 1, 'C', true);
    
    $pdf->SetFont('Arial', '', 10);
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
        
        $pdf->Cell(100, 8, $transaction['Service_Name'], 1, 0, 'L');
        $pdf->Cell(30, 8, $quantity_value, 1, 0, 'C');
        $pdf->Cell(30, 8, 'PHP ' . number_format($transaction['Service_Price'], 2), 1, 0, 'R');
        $pdf->Cell(30, 8, 'PHP ' . number_format($mult, 2), 1, 1, 'R');
    }
    
    // Total Row
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(160, 10, 'Total Amount', 1, 0, 'R');
    $pdf->Cell(30, 10, 'PHP ' . number_format($totalAmount, 2), 1, 1, 'R');
    
    // Footer
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 7, 'Payment Method: ' . $p_method, 0, 1);
    $pdf->Cell(0, 7, 'Note: Thank you for choosing Cherubim of Heaven Memorial Park, Inc!', 0, 1);
    
    // Output the PDF to the browser
    $pdf->Output();
}
?>
