<?php
// Include the FPDF library
require("fpdf/fpdf.php");

// Define the custom PDF class
class PDF extends FPDF {
    // Adding the Playfair Display in Bold Italic and Montserrat Regular to the header
    function Header() {
        // Define margins for the header (top, left, right)
        $topMargin = 9;    // Slightly reduced top margin to make the header a bit larger
        $sideMargin = 10;   // Left and right margin (in mm)

        // Set background color for the header with margins
        $this->SetFillColor(20, 30, 60);  // #141E3C (Dark Blue background)
        $this->Rect($sideMargin, $topMargin, $this->GetPageWidth() - 2 * $sideMargin, 22, 'F');  // Subtle increase in height of the background

        // Add the logo to the header (adjust the path, x, y, and width as needed)
        $this->Image('images/logo.png', $sideMargin, $topMargin + 3, 15);  // Logo placed at (sideMargin, topMargin + 3)

        // Set Playfair Display Bold Italic for the title in the header
        $this->SetFont('playfairdisplay', 'BI', 20);  // Title font size 20
        $this->SetTextColor(186, 173, 123);  // #BAAD7B (Cherubim of Heaven text color)

        // Move to the right, so the title is next to the logo, adjust X-coordinate closer to logo
        $this->SetXY($sideMargin + 15, $topMargin + 3);  // Move the cursor to the right of the logo (closer)

        // Title "Cherubim of Heaven"
        $this->Cell(0, 10, 'Cherubim Of Heaven', 0, 1, 'L');  // Title (Left-aligned next to the logo)

        // Subtitle "Funeral Service" - same X-coordinate, but adjust the Y position
        $this->SetXY($sideMargin + 15, $this->GetY()+2);  // Same X, move Y to current position
        $this->SetFont('montserrat', '', 12);
        $this->SetTextColor(255, 255, 255);  // White color for the subtitle
        
        // Apply manual letter spacing (add space between each character)
        $text = 'Funeral Service';
        $space = 4;  // 3 pixels (approximately 1.07 mm)
        for ($i = 0; $i < strlen($text); $i++) {
            $this->Cell($space, 0, $text[$i], 0, 0, 'L');
        }
        $this->Ln(10);  // Move to the next line after the subtitle

        // Now align the address and phone information to the right side of the header
        $this->SetFont('montserrat', '', 7);  // Slightly increased font size for address and phone
        $this->SetTextColor(255, 255, 255);  // White color for the address and phone

        // Set the X position for the right side of the page and align with the logo/title area
        $this->SetXY($this->GetPageWidth() - 120 - $sideMargin, $topMargin + 4);  // Adjust Y to keep alignment

        // Add address and phone info right-aligned
        $this->Cell(0, 8, 'Purok 4, San Pedro, Hagonoy, Bulacan, Philippines', 0, 1, 'R');
        $this->Cell(0, 5, 'Phone: +63 932 713 1818 | Tel: (044) 762 4284', 0, 1, 'R');

        // Add space after the header
        $this->Ln(10);  // Adds line break after header content
    }
}

// Initialize the PDF
$pdf = new PDF();
$pdf->AddFont('playfairdisplay', 'BI', 'PlayfairDisplay-BoldItalic.php');  // Playfair Display Bold Italic font
$pdf->AddFont('montserrat', '', 'Montserrat-Regular.php');
$pdf->AddFont('montserrat', 'B', 'Montserrat-Bold.php');  // Montserrat Regular font
$pdf->AddPage();

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
    if ($p_method == "COD") {
        $p_method = "Cash";
    }

    // Add company information to the PDF
    $pdf->SetFont('montserrat', 'B', 12);
      // Black text
    //$pdf->Cell(0, 10, 'Cherubim of Heaven Memorial Park, Inc.', 0, 1, 'C');
    $pdf->SetFont('montserrat', 'B', 14); 
    $pdf->SetTextColor(20, 30, 60);
    $pdf->Cell(0, 21, 'Order Summary', 0, 1, 'C');

    $pdf->Ln(10); // Adds 10mm vertical space
    
    // Invoice Details
    $pdf->SetFont('montserrat', '', 10);
    $pdf->Cell(0, 5, 'Transaction No. ' . str_pad($service_id, 6, "0", STR_PAD_LEFT), 0, 1, 'L');
    $pdf->Cell(0, 5, 'Date: ' . $formatted_date, 0, 1, 'L');
    
    $pdf->Ln(10);

    // Billing Information
    $pdf->SetFont('montserrat', 'B', 12);

    // Set the table header background color to match the header background color
    $pdf->SetFillColor(20, 30, 60);  // #141E3C (Dark Blue background)

    // Set the text color for the table header to match the logo title text color
    $pdf->SetTextColor(186, 173, 123);  // #BAAD7B (Cherubim of Heaven title text color)

    // Table header with the background and text color, centered
    $pdf->Cell(0, 10, 'Billing Information', 1, 1, 'C', true);  // Centered ('C')

    // Set the font and text color for the content in the billing information table
    $pdf->SetFont('montserrat', '', 10);
    $pdf->SetTextColor(0, 0, 0);  // Black text color for the content

    // Billing details
    $pdf->Cell(0, 7, 'Name: ' . $full_name, 1, 1, 'L');
    $pdf->Cell(0, 7, 'Contact: ' . $phone, 1, 1, 'L');
    $pdf->MultiCell(0, 7, 'Address: ' . $h_num . " " . $s_name . ", " . $purok . " " . $barangay . ", Hagonoy, Bulacan", 1, 'L');
    $pdf->Cell(0, 7, 'Email: ' . $email, 1, 1, 'L');

    $pdf->Ln(10);  // Adds extra space after the table
    
    // Transaction Table
    $pdf->SetFont('montserrat', 'B', 10);

    // Set the background color for the table header to dark blue (#141E3C)
    $pdf->SetFillColor(20, 30, 60);  // Dark Blue background color

    // Set the text color for the table header to light gold (#BAAD7B)
    $pdf->SetTextColor(186, 173, 123);  // Light gold text color

    // Define the header cells
    $pdf->Cell(100, 10, 'Service Name', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Quantity/Days', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Unit Price', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Total', 1, 1, 'C', true);

    // Reset text color back to black for the rest of the document
    $pdf->SetTextColor(0, 0, 0);  // Black text for table content

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

    $pdf->Ln(5);

    // Total Amount
    $pdf->SetFont('montserrat', 'B', 10);
    $pdf->Cell(160, 8, 'Total Amount', 1, 0, 'L');
    $pdf->Cell(30, 8, 'PHP ' . number_format($total, 2), 1, 1, 'R');

     // Footer
     $pdf->Ln(10);
     $pdf->SetFont('montserrat', '', 10);
     $pdf->Cell(0, 7, 'Payment Method: ' . $p_method, 0, 1);
     $pdf->Cell(0, 7, 'Note: Thank you for trusting Cherubim of Heaven Memorial Park, Inc.', 0, 1);

    $pdf->Output();
}
?>
