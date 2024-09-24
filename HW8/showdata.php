<?php
// เชื่อมต่อฐานข้อมูล 
$host = "localhost";
$username = "root";
$password = "";
$dbms = "dbhw8";
// สร้างการเชื่อมต่อ
$database = new mysqli($host, $username, $password, $dbms);

// ตรวจสอบการเชื่อมต่อ
if ($database->connect_error) {
    die("Connecting error: " . $database->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the uploaded photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photoName = $_FILES['photo']['name'];
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $uploadDir = 'uploads/';

        // Create uploads directory if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photoDestination = $uploadDir . basename($photoName);

        if (move_uploaded_file($photoTmpName, $photoDestination)) {
            $photoPath = $photoDestination;
        } else {
            $photoPath = "Error uploading photo.";
        }
    } else {
        $photoPath = "No photo uploaded.";
    }

    // Retrieve the personal information
    $fist_name = mysqli_real_escape_string($database, $_POST['fist_name']);
    $surname = mysqli_real_escape_string($database, $_POST['surname']);
    $gender = mysqli_real_escape_string($database, $_POST['gender']);
    $birthdate = mysqli_real_escape_string($database, $_POST['birthdate']);
    $province = mysqli_real_escape_string($database, $_POST['province']);
    $idNumber = mysqli_real_escape_string($database, $_POST['idNumber']);
    $sport = mysqli_real_escape_string($database, $_POST['sport']);
    $documents = isset($_POST['documents']) ? $_POST['documents'] : [];

    // Address information
    $currentHomenumber = mysqli_real_escape_string($database, $_POST['currentHomenumber']);
    $currentGroup = mysqli_real_escape_string($database, $_POST['currentGroup']);
    $cerrentRoad = mysqli_real_escape_string($database, $_POST['cerrentRoad']);
    $cantoncu = mysqli_real_escape_string($database, $_POST['cantoncu']);
    $districtcu = mysqli_real_escape_string($database, $_POST['districtcu']);
    $provincecu = mysqli_real_escape_string($database, $_POST['provincecu']);
    $zipcodecu = mysqli_real_escape_string($database, $_POST['zipcodecu']);
    $telephonenumbercu = mysqli_real_escape_string($database, $_POST['telephonenumbercu']);

    // Education details
    $Studying2 = mysqli_real_escape_string($database, $_POST['Studying2']);
    $Nameofeducationalinstitution2 = mysqli_real_escape_string($database, $_POST['Nameofeducationalinstitution2']);
    $houseNumber2 = mysqli_real_escape_string($database, $_POST['houseNumber2']);
    $road2 = mysqli_real_escape_string($database, $_POST['road2']);
    $canton2 = mysqli_real_escape_string($database, $_POST['canton2']);
    $district2 = mysqli_real_escape_string($database, $_POST['district2']);
    $province2 = mysqli_real_escape_string($database, $_POST['province2']);
    $zipcode2 = mysqli_real_escape_string($database, $_POST['zipcode2']);
    $telephonenumber2 = mysqli_real_escape_string($database, $_POST['telephonenumber2']);

    // Career details
    $workyear = mysqli_real_escape_string($database, $_POST['workyear']);
    $workmonth = mysqli_real_escape_string($database, $_POST['workmonth']);
    $name3 = mysqli_real_escape_string($database, $_POST['name3']);
    $houseNumber3 = mysqli_real_escape_string($database, $_POST['houseNumber3']);
    $road3 = mysqli_real_escape_string($database, $_POST['road3']);
    $canton3 = mysqli_real_escape_string($database, $_POST['canton3']);
    $district3 = mysqli_real_escape_string($database, $_POST['district3']);
    $province3 = mysqli_real_escape_string($database, $_POST['province3']);
    $zipcode3 = mysqli_real_escape_string($database, $_POST['zipcode3']);
    $telephonenumber3 = mysqli_real_escape_string($database, $_POST['telephonenumber3']);
    $Currentcareerdate = mysqli_real_escape_string($database, $_POST['Currentcareerdate']);

    // ข้อมูลเจ้าหน้าที่
    $officerSignaturename = mysqli_real_escape_string($database, $_POST['officerSignaturename']);
    $officerSignaturedate = mysqli_real_escape_string($database, $_POST['officerSignaturedate']);
    $presidentSignaturename = mysqli_real_escape_string($database, $_POST['presidentSignaturename']);
    $presidentSignaturenamedate = mysqli_real_escape_string($database, $_POST['presidentSignaturenamedate']);

    // เพิ่มข้อมูลในฐานข้อมูล
    $sql = "INSERT INTO athlete (fist_name, surname, gender, birthdate, province, idNumber, sport, documents, currentHomenumber, currentGroup,
        cerrentRoad, cantoncu, districtcu, provincecu, zipcodecu, telephonenumbercu, Studying2, Nameofeducationalinstitution2, houseNumber2,
        road2, canton2, district2, province2, zipcode2, telephonenumber2, workyear, workmonth, name3, houseNumber3, road3, canton3, district3, province3,
        zipcode3, telephonenumber3, Currentcareerdate, officerSignaturename, officerSignaturedate, presidentSignaturename, presidentSignaturenamedate)
        VALUES ('$fist_name', '$surname', '$gender', '$birthdate', '$province', '$idNumber', '$sport', '" . implode(",", $documents) . "', 
        '$currentHomenumber', '$currentGroup', '$cerrentRoad', '$cantoncu', '$districtcu', '$provincecu', '$zipcodecu', '$telephonenumbercu', 
        '$Studying2', '$Nameofeducationalinstitution2', '$houseNumber2', '$road2', '$canton2', '$district2', '$province2', '$zipcode2', 
        '$telephonenumber2', '$workyear', '$workmonth', '$name3', '$houseNumber3', '$road3', '$canton3', '$district3', '$province3', 
        '$zipcode3', '$telephonenumber3', '$Currentcareerdate', '$officerSignaturename', '$officerSignaturedate', '$presidentSignaturename', 
        '$presidentSignaturenamedate')";

    // เช็คว่าข้อมูลได้เพิ่มเข้าฐานข้อมูล
    if ($database->query($sql) === true) {
        echo "เพิ่มข้อมูลใหม่สำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $database->error;
    }

    // Display the submitted data
    echo "<h1>Submitted Information</h1>";
    echo "<p><strong>Name:</strong> $fist_name $surname</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Birthdate:</strong> $birthdate</p>";
    echo "<p><strong>Province:</strong> $province</p>";
    echo "<p><strong>ID Number:</strong> $idNumber</p>";
    echo "<p><strong>Sport:</strong> $sport</p>";
    echo "<p><strong>Uploaded Photo:</strong> <img src='$photoPath' alt='Uploaded Photo' style='width:100px;height:100px;'></p>";

    // Display selected documents
    echo "<h3>Documents:</h3>";
    if (!empty($documents)) {
        echo "<ul>";
        foreach ($documents as $document) {
            echo "<li>" . htmlspecialchars($document) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No documents selected.</p>";
    }

    // Display current address
    echo "<h2>Current Address</h2>";
    echo "<p><strong>House Number:</strong> $currentHomenumber</p>";
    echo "<p><strong>Group:</strong> $currentGroup</p>";
    echo "<p><strong>Road:</strong> $cerrentRoad</p>";
    echo "<p><strong>Sub-district:</strong> $cantoncu</p>";
    echo "<p><strong>District:</strong> $districtcu</p>";
    echo "<p><strong>Province:</strong> $provincecu</p>";
    echo "<p><strong>Zipcode:</strong> $zipcodecu</p>";
    echo "<p><strong>Telephone:</strong> $telephonenumbercu</p>";

    // Display education information
    echo "<h2>Education Details</h2>";
    echo "<p><strong>Studying:</strong> $Studying2</p>";
    echo "<p><strong>Educational Institution:</strong> $Nameofeducationalinstitution2</p>";
    echo "<p><strong>House Number:</strong> $houseNumber2</p>";
    echo "<p><strong>Road:</strong> $road2</p>";
    echo "<p><strong>Sub-district:</strong> $canton2</p>";
    echo "<p><strong>District:</strong> $district2</p>";
    echo "<p><strong>Province:</strong> $province2</p>";
    echo "<p><strong>Zipcode:</strong> $zipcode2</p>";
    echo "<p><strong>Telephone:</strong> $telephonenumber2</p>";

    // Display career information
    echo "<h2>Career Details</h2>";
    echo "<p><strong>Years of Work:</strong> $workyear</p>";
    echo "<p><strong>Months of Work:</strong> $workmonth</p>";
    echo "<p><strong>Agency Name:</strong> $name3</p>";
    echo "<p><strong>House Number:</strong> $houseNumber3</p>";
    echo "<p><strong>Road:</strong> $road3</p>";
    echo "<p><strong>Sub-district:</strong> $canton3</p>";
    echo "<p><strong>District:</strong> $district3</p>";
    echo "<p><strong>Province:</strong> $province3</p>";
    echo "<p><strong>Zipcode:</strong> $zipcode3</p>";
    echo "<p><strong>Telephone:</strong> $telephonenumber3</p>";
    echo "<p><strong>Date:</strong> $Currentcareerdate</p>";

    // Display ข้อมูลเจ้าหน้าที่
    echo "<h2>เจ้าหน้าที่</h2>";
    echo "<p><strong>ชื่อผู้อำนวยการศูนย์ กกท. จังหวัดมุกดาหาร:</strong> $officerSignaturename</p>";
    echo "<p><strong>วันที่ลงชื่อผู้อำนวยการศูนย์ กกท. จังหวัดมุกดาหาร:</strong> $officerSignaturedate</p>";
    echo "<p><strong>ชื่อนายกสมาคมกีฬาจังหวัดมุกดาหาร:</strong> $presidentSignaturename</p>";
    echo "<p><strong>วันที่ลงชื่อนายกสมาคมกีฬาจังหวัดมุกดาหาร:</strong> $presidentSignaturenamedate</p>";

} else {
    echo "No form data submitted!";
}
?>
