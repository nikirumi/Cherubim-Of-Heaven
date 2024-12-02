document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('download-pdf').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        
        // Create a new jsPDF instance
        const doc = new jsPDF();
        
        // Get the report title and date
        const reportTitle = 'TRANSACTION REPORT';
        const dateGenerated = document.querySelector('.tabi1 p').textContent.trim();  // Get Date Generated

        // Set the title and date in the PDF
        doc.text(reportTitle, 14, 16);
        doc.text(dateGenerated, 14, 22);

        // Add a line break before the table
        doc.text(' ', 14, 30);

        // Get the table content
        const table = document.getElementById('report-table');
        const rows = table.querySelectorAll('tr');
        const tableData = [];

        // Extract header
        const headers = Array.from(rows[0].querySelectorAll('th')).map(header => header.innerText);
        tableData.push(headers);

        // Extract table rows (skip the header)
        rows.forEach((row, index) => {
            if (index > 0) { // Skip the header row
                const cells = row.querySelectorAll('td');
                const rowData = Array.from(cells).map(cell => cell.innerText);
                tableData.push(rowData);
            }
        });

        // Check if we have data
        if (tableData.length > 1) {
            // Add the table to the PDF
            doc.autoTable({
                head: [headers],
                body: tableData.slice(1), // Skip the header in body data
                startY: 40, // Start the table after the title and date
                theme: 'grid',
                headStyles: { fillColor: [22, 160, 133] }, // Custom header color
                styles: { fontSize: 10 }, // Adjust font size for readability
            });

            // Save the PDF with a custom name
            doc.save('transaction_report.pdf');
        } else {
            alert('No data available for the report.');
        }
    });
});
