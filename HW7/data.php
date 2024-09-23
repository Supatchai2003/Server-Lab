<?php
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
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $province = $_POST['province'];
    $idNumber = $_POST['idNumber'];
    $sport = $_POST['sport'];
    $documents = isset($_POST['documents']) ? $_POST['documents'] : [];

    // Address information
    $currentHomenumber = $_POST['currentHomenumber'];
    $currentGroup = $_POST['currentGroup'];
    $cerrentRoad = $_POST['cerrentRoad'];
    $cantoncu = $_POST['cantoncu'];
    $districtcu = $_POST['districtcu'];
    $provincecu = $_POST['provincecu'];
    $zipcodecu = $_POST['zipcodecu'];
    $telephonenumbercu = $_POST['telephonenumbercu'];

    // Education details
    $Studying2 = $_POST['Studying2'];
    $Nameofeducationalinstitution2 = $_POST['Nameofeducationalinstitution2'];
    $houseNumber2 = $_POST['houseNumber2'];
    $road2 = $_POST['road2'];
    $canton2 = $_POST['canton2'];
    $district2 = $_POST['district2'];
    $province2 = $_POST['province2'];
    $zipcode2 = $_POST['zipcode2'];
    $telephonenumber2 = $_POST['telephonenumber2'];

    // Career details
    $year = $_POST['year'];
    $month = $_POST['month'];
    $name3 = $_POST['name3'];
    $houseNumber3 = $_POST['houseNumber3'];
    $road3 = $_POST['road3'];
    $canton3 = $_POST['canton3'];
    $district3 = $_POST['district3'];
    $province3 = $_POST['province3'];
    $zipcode3 = $_POST['zipcode3'];
    $telephonenumber3 = $_POST['telephonenumber3'];
    $Currentcareerdate = $_POST['Currentcareerdate'];

    // Display the submitted data
    echo "<h1>Submitted Information</h1>";
    echo "<p><strong>Name:</strong> $name $surname</p>";
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
    echo "<p><strong>Years of Work:</strong> $year</p>";
    echo "<p><strong>Months of Work:</strong> $month</p>";
    echo "<p><strong>Agency Name:</strong> $name3</p>";
    echo "<p><strong>House Number:</strong> $houseNumber3</p>";
    echo "<p><strong>Road:</strong> $road3</p>";
    echo "<p><strong>Sub-district:</strong> $canton3</p>";
    echo "<p><strong>District:</strong> $district3</p>";
    echo "<p><strong>Province:</strong> $province3</p>";
    echo "<p><strong>Zipcode:</strong> $zipcode3</p>";
    echo "<p><strong>Telephone:</strong> $telephonenumber3</p>";
    echo "<p><strong>Date:</strong> $Currentcareerdate</p>";

} else {
    echo "No form data submitted!";
}
?>
