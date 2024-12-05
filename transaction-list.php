<?php
    include ("connect.php");
    session_start();

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: admin-login.php');
        exit();
    }

    $total_transaction = 0;
    $total_paid_count = 0;
    $total_pending_count = 0;

    // PANG COUNT NG TOTAL 
    $query = "SELECT 
                COUNT(t.Transaction_ID) AS total_transaction,
                COUNT(CASE WHEN t.Payment_status = 'Paid' THEN 1 END) AS total_paid_count,
                COUNT(CASE WHEN t.Payment_status = 'Pending' THEN 1 END) AS total_pending_count
            FROM 
                transaction t
            JOIN 
                client c ON t.Client_ID = c.Client_ID
            LEFT JOIN 
                service_progress sp ON t.Transaction_ID = sp.Transaction_ID
            LEFT JOIN 
                memorial_services ms ON sp.Service_ID = ms.Service_ID;";

    $result = mysqli_query($conn, $query);
                
    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }

    if ($row = mysqli_fetch_assoc($result)) {
        $total_transaction = $row['total_transaction'];
        $total_paid_count = $row['total_paid_count'];
        $total_pending_count = $row['total_pending_count'];
    }

    // PANG SEARCH
    $search_query = "SELECT 
                        t.Transaction_ID AS Transaction_ID,
                        CONCAT(c.Fname, ' ', c.Lname) AS Customer_Name,
                        t.Transaction_date AS Transaction_Date,
                        t.Total_Amount AS Total_Amount,
                        t.Payment_Method,
                        t.Payment_Status AS Payment_Status,
                        sp.Service_Status AS Service_Status,
                        ms.Service_Type AS Service_Type
                    FROM 
                        transaction t
                    JOIN 
                        client c ON t.Client_ID = c.Client_ID
                    LEFT JOIN 
                        service_progress sp ON t.Transaction_ID = sp.Transaction_ID
                    LEFT JOIN 
                        memorial_services ms ON sp.Service_ID = ms.Service_ID";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $transaction_ID2 = filter_var($_POST['transaction_ID2'], FILTER_SANITIZE_SPECIAL_CHARS); // transaction_id2 na field
        $client_Name = filter_var($_POST['client_Name'], FILTER_SANITIZE_SPECIAL_CHARS);// client name na field

        // append yung existing query based sa search
        if (!empty($transaction_ID2)) {
            $search_query .= " WHERE t.Transaction_ID LIKE '%$transaction_ID2%'";
        }

        if (!empty($client_Name)) {
            // If meron nang WHERE clause, add AND condition
            if (strpos($search_query, 'WHERE') !== false) { // strpos parang contains(), false pag walang match sa mga index
                $search_query .= " AND CONCAT(c.Fname, ' ', c.Lname) LIKE '%$client_Name%'";
            } else {
                $search_query .= " WHERE CONCAT(c.Fname, ' ', c.Lname) LIKE '%$client_Name%'";
            }
        }

        $fromDate = isset($_POST['fromDate']) ? filter_var($_POST['fromDate'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $toDate = isset($_POST['toDate']) ? filter_var($_POST['toDate'], FILTER_SANITIZE_SPECIAL_CHARS) : null;

        if (!empty($fromDate)) {
            if (strpos($search_query, 'WHERE') !== false) {
                $search_query .= " AND t.Transaction_date >= '$fromDate'";
            } else {
                $search_query .= " WHERE t.Transaction_date >= '$fromDate'";
            }
        }
        
        if (!empty($toDate)) {
            if (strpos($search_query, 'WHERE') !== false) {
                $search_query .= " AND t.Transaction_date <= '$toDate'";
            } else {
                $search_query .= " WHERE t.Transaction_date <= '$toDate'";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
        
        if (!empty($_POST['payment_status'])) {
            $payment_status = filter_var($_POST['payment_status'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (strpos($search_query, 'WHERE') !== false) {
                $search_query .= " AND t.Payment_Status = '$payment_status'";
            } else {
                $search_query .= " WHERE t.Payment_Status = '$payment_status'";
            }
        }
    
        
        if (!empty($_POST['service_type'])) {
            $service_type = filter_var($_POST['service_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (strpos($search_query, 'WHERE') !== false) {
                $search_query .= " AND ms.Service_Type = '$service_type'";
            } else {
                $search_query .= " WHERE ms.Service_Type = '$service_type'";
            }
        }

        if (!empty($_POST['payment_method'])) {
            $payment_method = filter_var($_POST['payment_method'], FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (strpos($search_query, 'WHERE') !== false) {
                $search_query .= " AND t.Payment_Method = '$payment_method'";
            } else {
                $search_query .= " WHERE t.Payment_Method = '$payment_method'";
            }
        }
    }
    // eexecute na yung query
    $result = mysqli_query($conn, $search_query);
    
    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transaction Reports </title>
	<link rel="stylesheet" href="css/transaction-lists.css" class="color-switcher-link">
</head>

<body>
	<div id="nav">
		<div id="nav-elements">
			<img src="images/logo.png">
			<div>
				<h4 class="logo-text color-main">Cherubim Of Heaven</h4>
				<span class="logo-subtext">Funeral Service</span>
			</div>
		</div>

		<div id="back-button"> <a href="admin.php">Main Menu</a> </div>
	</div>

	<div id="down">

		<div id="base">

			<div id="title">
				<h1>TRANSACTION REPORTS</h1>
			</div>

			<div id="report-blocks">
				<div class="block">
					<p>TRANSACTIONS: </p>
					<p>
						<?php  echo  $total_transaction ;?>
					</p>
				</div>

				<div class="block">
					<p>PAID: </p>
					<p>
						<?php  echo  $total_paid_count ;?>
					</p>
				</div>

				<div class="block">
					<p>PENDING: </p>
					<p>
						<?php  echo  $total_pending_count ;?>
					</p>
				</div>


				<button id="download" class="woocommerce-Button btn btn-maincolor" style=" border-radius:15px;
                            background-color: #1f2f5e; 
                            color: white;">Download Report</button>



			</div>

			<form id="transaction-form" action="" method="post">

				<div id="delete-row">

					<p>Enter ID and toggle status:</p>
					<div>

						<input class="boxDesign" type="text" class="form-control" name="transaction_ID1"
							id="transaction_ID" value="" placeholder="Transaction ID">

						<select class="boxDesign2" name="payment_status" id="payment_status">
							<option class="boxDesign" value="" disabled selected>Select Payment Status</option>
							<option class="boxDesign" value="Paid">Paid</option>
							<option class="boxDesign" value="Pending">Pending</option>

						</select>

						<select class="boxDesign2" name="service_status" id="service_status">
							<option class="boxDesign" value="" disabled selected>Select Progress Status</option>
							<option class="boxDesign" value="On Going">On Going</option>
							<option class="boxDesign" value="Completed">Completed</option>
						</select>

						<button id="toggle" type="submit" class="woocommerce-Button btn btn-maincolor"
							name="toggle_status">Toggle Status</button>
					</div>

				</div>

				<div id="delete-row">

					<p>Search using one of the following:</p>

					<div class="tabi">

						<div>
							<input class="boxDesign" type="text" class="form-control" name="transaction_ID2"
								id="transaction_ID" value="" placeholder="Transaction ID">
							<input class="boxDesign" type="text" class="form-control" name="client_Name"
								id="transaction_ID" value="" placeholder="Client Name">
						</div>

						<div class="patong">
							<div id="fromDate">
								FROM:
								<input class="boxDesign4" type="date" name="fromDate" placeholder="YYYY-MM-DD">
							</div>
							<div id="toDate">
								TO:
								<input class="boxDesign4" type="date" name="toDate" placeholder="YYYY-MM-DD">
							</div>
						</div>
					</div>
				</div>

				<div id="searchDIV">
					<button id="toggle" type="submit" class="woocommerce-Button btn btn-maincolor" name="search"
						style=" margin-right:15px">Search</button>
				</div>

				<div id="filter">
					<div id="filter">

						<select class="boxDesign3" name="payment_status" id="payment_status">
							<option class="boxDesign" value="" disabled selected>Payment Filter</option>
							<option class="boxDesign" value="Paid">Paid</option>
							<option class="boxDesign" value="Pending">Pending</option>
						</select>

						<select class="boxDesign3" name="service_type" id="service_status">
							<option class="boxDesign" value="" disabled selected>Service Filter</option>
							<option class="boxDesign" value="goods">Goods</option>
							<option class="boxDesign" value="space">Space</option>
							<option class="boxDesign" value="funeral">Funeral</option>
						</select>

						<select class="boxDesign3" name="payment_method" id="service_status">
							<option class="boxDesign" value="" disabled selected>Payment Method</option>
							<option class="boxDesign" value="COD">COD</option>
							<option class="boxDesign" value="Other">Other</option>
						</select>

						<button id="refreshh" type="submit" name="filter"> <img id=refresh src="images/refresh2.png">
						</button>


					</div>
				</div>


			</form>

			<!-- Include jsPDF and jsPDF autoTable plugin -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>


			<!-- This is the table generated by PHP -->
			<div id="table">
				<table>
					<thead>
						<tr>
							<th>Transaction ID</th>
							<th>Client Name</th>
							<th>Purchased Service</th>
							<th>Transaction Date</th>
							<th>Total Amount</th>
							<th>Payment Method</th>
							<th>Payment Status</th>
							<th>Service Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            // Fetch and display search results if there are any
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Transaction_ID'] . "</td>";
                                echo "<td>" . $row['Customer_Name'] . "</td>";
                                echo "<td>" . $row['Service_Type'] . "</td>";
                                echo "<td>" . date("Y-m-d", strtotime($row['Transaction_Date'])) . "</td>";
                                echo "<td> ₱" . number_format($row['Total_Amount'], 2) . "</td>";
                                echo "<td>" . $row['Payment_Method'] . "</td>";
                                echo "<td>" . $row['Payment_Status'] . "</td>";
                                echo "<td>" . $row['Service_Status'] . "</td>";
                                echo "</tr>";
                            }
                        ?>
					</tbody>
				</table>
			</div>

			<!-- This is the report table that will be populated dynamically -->
			<div id="form-preview" class="hidden">
				<div class="paper">
                <div id="nav-elements" style="margin-bottom: 22px; margin-top:30px; font-style: italic;">
                    <img src="images/logo.png">
                    <div>
                        <h4 class="logo-text color-main" style="color:#baad7b;">Cherubim Of Heaven</h4>
                        <span class="logo-subtext">Funeral Service</span>
                    </div>
                </div>

					
					<form>
						<label for="name" style=" font-size:20px; margin-top:30px;">TRANSACTION REPORT</label>
						<div class="tabi1" style=" margin-bottom:35px;">
							<p style=" font-size:20px;"><b>Date Generated: 
								<?php echo date('Y-m-d H:i:s'); ?></b>
							</p>
						</div>

						<!-- Transaction report table -->
						<table id="report-table">
							<thead>
								<tr>
									<th>Transaction ID</th>
									<th>Client Name</th>
									<th>Purchased Service</th>
									<th>Transaction Date</th>
									<th>Total Amount</th>
									<th>Payment Method</th>
									<th>Payment Status</th>
									<th>Service Status</th>
								</tr>
							</thead>
							<tbody id="report-body">
								<!-- Rows will be dynamically copied here from the PHP table -->
							</tbody>
						</table>

						<div class="tabi1">
							<button type="button" id="download-pdf" class="btn">Download PDF</button>
						</div>
					</form>
				</div>
			</div>

			<script>
				document.getElementById('download-pdf').addEventListener('click', function () {
                const table = document.querySelector('#report-table');

                if (table && table.rows.length > 1) {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF({
                        format: 'letter',
                        orientation: 'portrait'
                    });

                    doc.setFont('Arial', 'normal');
                    doc.setFontSize(9);

                    const logoPath = 'images/logo.png';
                    const logoText = 'Cherubim Of Heaven';
                    const logoSubtext = 'Funeral Service';

                    const logoSize = 50 * 25.4 / 96;

                    doc.addImage(logoPath, 'PNG', 10, 10, logoSize, logoSize);

                    const textOffsetX = 25;
                    const textOffsetY = -3;

                    doc.setFont("Montserrat", "normal");
                    doc.setFontSize(12);
                    doc.setTextColor(154, 154, 154);
                    doc.text(logoSubtext, textOffsetX, 28 + textOffsetY);

                    doc.setFont("Playfair Display", "italic");
                    doc.setFontSize(24);
                    doc.setTextColor(186, 173, 123);
                    doc.text(logoText, textOffsetX, 20 + textOffsetY);

                    doc.setFont("Times New Roman", "bold");
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('TRANSACTION REPORT', 10, 45);

                    doc.setFont("Times New Roman", "bold");
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('Date Generated: ' + new Date().toLocaleString(), 10, 50);

                    const headers = [
                        'Transaction ID', 'Client Name', 'Purchased Service',
                        'Transaction Date', 'Total Amount', 'Payment Method',
                        'Payment Status', 'Service Status'
                    ];
                    const rows = [];

                    const rowsData = table.querySelectorAll('tbody tr');
                    rowsData.forEach(row => {
                        const rowData = [];
                        row.querySelectorAll('td').forEach(cell => {
                            let cellText = cell.innerText;
                            cellText = cellText.replace('₱', '').replace('Php ', '').replace(/\s+/g, '');
                            rowData.push(cellText);
                        });
                        rows.push(rowData);
                    });

                    // Adjusting table margins and column width
                    doc.autoTable({
                        head: [headers],
                        body: rows,
                        startY: 60,
                        margin: { top: 20, left: 10, right: 10 }, // Thinner margins
                        theme: 'striped',
                        tableWidth: 'auto',
                        headStyles: {
                            fillColor: [31, 47, 94],
                            textColor: [249, 249, 249],
                            fontStyle: 'bold'
                        },
                        bodyStyles: {
                            fontSize: 9,
                            cellPadding: 5,
                            lineColor: [221, 221, 221],
                            lineWidth: 0.5
                        },
                        columnStyles: {
                            0: { cellWidth: 'auto' },
                            1: { cellWidth: 'auto' },
                            2: { cellWidth: 'auto' },
                            3: { cellWidth: 'auto' },
                            4: { cellWidth: 'auto' },
                            5: { cellWidth: 'auto' },
                            6: { cellWidth: 'auto' },
                            7: { cellWidth: 'auto' }
                        },
                        rowHeight: 8
                    });

                    const date = new Date();
                    const formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1).toString().padStart(2, '0') + '-' + date.getDate().toString().padStart(2, '0');

                    const filename = `transaction_report_${formattedDate}.pdf`;

                    doc.save(filename);
                } else {
                    alert("No data found in the table to generate the PDF.");
                }
            });


			</script>



			<script>

                //pinopopulate yung table sa pop up form
				document.getElementById('download').addEventListener('click', function () {
					const reportTableBody = document.getElementById('report-body');

					// Clear previous content in the popup table body
					reportTableBody.innerHTML = '';

					// Retrieve current data from the main table (even if filtered)
					const rows = document.querySelectorAll('#table tbody tr');

					// Loop through each row in the main table
					rows.forEach(function (row) {
						const newRow = document.createElement('tr');

						// Loop through each cell in the row and add it to the new row in the popup
						const cells = row.querySelectorAll('td');
						cells.forEach(function (cell) {
							const newCell = document.createElement('td');
							newCell.innerHTML = cell.innerHTML;  // Copy cell content
							newRow.appendChild(newCell);
						});

						// Append the new row to the report table in the popup
						reportTableBody.appendChild(newRow);
					});

					// Display the popup by removing the 'hidden' class
					document.getElementById('form-preview').classList.remove('hidden');
				});


				document.getElementById('form-preview').addEventListener('click', (event) => {
					if (!event.target.closest('.paper')) {
						document.getElementById('form-preview').classList.add('hidden');
					}
				});

			</script>



		</div>
	</div>

	<script>
		document.getElementById('transaction-form').onsubmit = function (event) {
			var transaction_ID = document.getElementById('transaction_ID1').value;
			if (transaction_ID === '') {
				alert('Transaction ID cannot be empty!');
				event.preventDefault();
				return false;
			}
		};
	</script>

</body>

</html>


<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if( isset($_POST['toggle_status']) ){
     
            $transaction_ID1 = filter_var($_POST['transaction_ID1'], FILTER_SANITIZE_SPECIAL_CHARS);

            if (!empty($transaction_ID1)) {
                
                $stmt = $conn->prepare("SELECT * FROM transaction WHERE Transaction_ID = ? LIMIT 1");
                $stmt->bind_param("s", $transaction_ID1);
                $stmt->execute();
                $result = $stmt->get_result();
                $end_datetime = date("Y-m-d H:i:s");

                if ($result->num_rows > 0) {
                    // Check and update payment status if may laman
                    if (!empty($_POST['payment_status'])) {
                        $payment_status = filter_var($_POST['payment_status'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $stmt = $conn->prepare("UPDATE transaction SET Payment_status = ? WHERE Transaction_ID = ?");
                        $stmt->bind_param("ss", $payment_status, $transaction_ID1);

                        if ($stmt->execute()) {
                            echo "<script>alert('Payment Status Updated!');</script>";
                            echo "<script>window.location.href = 'transaction-list.php';</script>";
                        } else {
                            echo "<script>alert('Error: " . $stmt->error . "');</script>";
                        }
                    }

                    // Check and update service status if may laman
                    if (!empty($_POST['service_status'])) {
                        $service_status = filter_var($_POST['service_status'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $stmt = $conn->prepare("UPDATE service_progress SET Service_status = ? WHERE Transaction_ID = ?");
                        $stmt->bind_param("ss", $service_status, $transaction_ID1);

                        if ($stmt->execute()) {
                            // If the service status is completed, set the end date/time
                            if ($service_status === "Completed") {
                                $stmt2 = $conn->prepare("UPDATE service_progress SET End_Datetime = ? WHERE Transaction_ID = ?");
                                $stmt2->bind_param("ss", $end_datetime, $transaction_ID1);
                                
                                if ($stmt2->execute()) {
                                    echo "<script>alert('Service Status Updated and End Date/Time recorded!');</script>";
                                } else {
                                    echo "<script>alert('Error updating End Datetime: " . $stmt2->error . "');</script>";
                                }
                            }
                            echo "<script>alert('Service Status Updated!');</script>";
                            echo "<script>window.location.href = 'transaction-list.php';</script>";
                        } else {
                            echo "<script>alert('Error: " . $stmt->error . "');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Transaction ID does not exist');</script>";
                    echo "<script>window.location.href = 'transaction-list.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Transaction ID cannot be empty!');</script>";
                echo "<script>window.location.href = 'transaction-list.php';</script>";
                exit();
            }
        }
    }
?>
