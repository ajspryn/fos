<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function filledCell(cell) {
          return cell !== '' && cell != null;
        }
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                  row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                  headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Under Maintenance</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff4d4d;
            font-family: Arial, sans-serif;
            color: white;
            overflow: hidden;
        }
        .container {
            text-align: center;
            position: relative;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .button {
            padding: 15px 30px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            transition: transform 0.2s;
        }
        #contactAdmin {
            background-color: #ffffff;
            color: #ff4d4d;
            position: relative;
        }
        #waitButton {
            background-color: #333;
            color: white;
        }
        #thankYouCard {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: #ff4d4d;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            text-align: center;
            font-size: 1.5rem;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Website Sedang Maintenance</h1>
        <p>Mohon maaf, kami sedang melakukan perbaikan. Silakan coba lagi nanti.</p>
        <button id="contactAdmin" class="button">Hubungi Admin</button>
        <button id="waitButton" class="button">Yaudah, Tunggu Deh</button>
    </div>
    <div id="thankYouCard">
        <h2>Terima Kasih!</h2>
        <p>Kamu sabar banget mau nunggu. Kami akan segera kembali!</p>
    </div>

    <script>
        const contactAdmin = document.getElementById('contactAdmin');
        const waitButton = document.getElementById('waitButton');
        const thankYouCard = document.getElementById('thankYouCard');

        contactAdmin.addEventListener('mouseover', () => {
            const maxX = window.innerWidth - contactAdmin.offsetWidth;
            const maxY = window.innerHeight - contactAdmin.offsetHeight;
            const newX = Math.random() * maxX;
            const newY = Math.random() * maxY;
            contactAdmin.style.position = 'absolute';
            contactAdmin.style.left = `${newX}px`;
            contactAdmin.style.top = `${newY}px`;
        });

        waitButton.addEventListener('click', () => {
            thankYouCard.style.display = 'block';
        });
    </script>
</body>
</html>