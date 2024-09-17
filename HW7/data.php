<?php
// ตรวจสอบว่าเป็นการส่งข้อมูลแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ดึงข้อมูลจากฟอร์ม
    $name = htmlspecialchars($_POST['name'] ?? 'ไม่ระบุ');
    $surname = htmlspecialchars($_POST['surname'] ?? 'ไม่ระบุ');
    $gender = htmlspecialchars($_POST['gender'] ?? 'ไม่ระบุ');
    $birthdate = htmlspecialchars($_POST['birthdate'] ?? 'ไม่ระบุ');
    $provinceOfBirth = htmlspecialchars($_POST['province'] ?? 'ไม่ระบุ');
    $idNumber = htmlspecialchars($_POST['idNumber'] ?? 'ไม่ระบุ');
    $sport = htmlspecialchars($_POST['sport'] ?? 'ไม่ระบุ');
    $registrationType = $_POST['registrationType'] ?? [];
    $documents = $_POST['documents'] ?? [];

    // แสดงข้อมูล
    echo "<h1>ข้อมูลที่ได้รับ</h1>";
    echo "<p><strong>ชื่อ:</strong> $name</p>";
    echo "<p><strong>นามสกุล:</strong> $surname</p>";
    echo "<p><strong>เพศ:</strong> " . ($gender == 'male' ? 'ชาย' : 'หญิง') . "</p>";
    echo "<p><strong>วันเกิด:</strong> $birthdate</p>";
    echo "<p><strong>จังหวัดที่เกิด:</strong> $provinceOfBirth</p>";
    echo "<p><strong>เลขประจำตัวประชาชน:</strong> $idNumber</p>";
    echo "<p><strong>ชนิดกีฬา:</strong> $sport</p>";

    // แสดงประเภทการขึ้นทะเบียน
    echo "<h2>ประเภทที่ขอขึ้นทะเบียน</h2>";
    echo "<ul>";
    if (is_array($registrationType) && !empty($registrationType)) {
        foreach ($registrationType as $type) {
            echo "<li>";
            switch ($type) {
                case 'birthCertificate':
                    echo "ตามสูติบัตร";
                    break;
                case 'occupation':
                    echo "ตามสถานประกอบอาชีพ";
                    break;
                case 'education':
                    echo "ตามสถานศึกษา";
                    break;
                default:
                    echo "ไม่ทราบประเภท";
                    break;
            }
            echo "</li>";
        }
    } else {
        echo "<li>ไม่มีข้อมูลประเภทการขึ้นทะเบียน</li>";
    }
    echo "</ul>";

    // แสดงหลักฐานประกอบ
    echo "<h2>หลักฐานประกอบใบสมัคร</h2>";
    echo "<ul>";
    if (is_array($documents) && !empty($documents)) {
        foreach ($documents as $document) {
            echo "<li>";
            switch ($document) {
                case 'birthCertificate':
                    echo "สำเนาสูติบัตร";
                    break;
                case 'idCard':
                    echo "สำเนาบัตรประชาชน";
                    break;
                case 'houseRegistration':
                    echo "สำเนาทะเบียนบ้านที่อยู่ปัจจุบัน";
                    break;
                case 'certificateFromTheEducationalInstitution':
                    echo "ใบรับรองจากสถานศึกษาฉบับจริง";
                    break;
                case 'copyOfEducationalRecords':
                    echo "สำเนาใบระเบียนการศึกษา";
                    break;
                default:
                    echo "ไม่ทราบหลักฐาน";
                    break;
            }
            echo "</li>";
        }
    } else {
        echo "<li>ไม่มีข้อมูลหลักฐานประกอบ</li>";
    }
    echo "</ul>";

    // แสดงรูปโปรไฟล์
    if (isset($_FILES['imgProfile']) && $_FILES['imgProfile']['error'] == UPLOAD_ERR_OK) {
        $imgProfilePath = 'uploads/' . basename($_FILES['imgProfile']['name']);
        $fileType = pathinfo($imgProfilePath, PATHINFO_EXTENSION);
        $allowedTypes = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileType, $allowedTypes) && $_FILES['imgProfile']['size'] < 1000000) {
            move_uploaded_file($_FILES['imgProfile']['tmp_name'], $imgProfilePath);
            echo "<p><strong>รูปโปรไฟล์:</strong> <img src='$imgProfilePath' alt='Profile Image' style='max-width: 200px;'></p>";
        } else {
            echo "<p><strong>รูปโปรไฟล์:</strong> ไฟล์ไม่ถูกต้องหรือมีขนาดใหญ่เกินไป</p>";
        }
    } else {
        echo "<p><strong>รูปโปรไฟล์:</strong> ไม่มีการอัปโหลดรูปภาพ</p>";
    }

    // แสดงที่อยู่ปัจจุบัน
    echo "<h2>ที่อยู่ปัจจุบัน</h2>";
    echo "<p><strong>บ้านเลขที่:</strong> " . htmlspecialchars($_POST['currentHouseNumber1'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>หมู่:</strong> " . htmlspecialchars($_POST['currentGroup2'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>ถนน:</strong> " . htmlspecialchars($_POST['currentRoad3'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>ตำบล/แขวง:</strong> " . htmlspecialchars($_POST['currentCanton1'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>อำเภอ/เขต:</strong> " . htmlspecialchars($_POST['currentDistrict2'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>จังหวัด:</strong> " . htmlspecialchars($_POST['currentProvince3'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>รหัสไปรษณีย์:</strong> " . htmlspecialchars($_POST['currentZipcode4'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>โทรศัพท์:</strong> " . htmlspecialchars($_POST['currentTelephone5'] ?? 'ไม่ระบุ') . "</p>";

    // ข้อมูลสถานศึกษา
    echo "<h2>สถานศึกษา</h2>";
    echo "<p><strong>ชื่อสถานศึกษา:</strong> " . htmlspecialchars($_POST['educationalInstitution'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>ที่อยู่:</strong> " . htmlspecialchars($_POST['educationalAddress'] ?? 'ไม่ระบุ') . "</p>";

    // ข้อมูลสถานประกอบการ
    echo "<h2>สถานประกอบการ</h2>";
    echo "<p><strong>ชื่อสถานประกอบการ:</strong> " . htmlspecialchars($_POST['workplaceName'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>ที่อยู่:</strong> " . htmlspecialchars($_POST['workplaceAddress'] ?? 'ไม่ระบุ') . "</p>";
    echo "<p><strong>ระยะเวลาในการทำงาน:</strong> " . htmlspecialchars($_POST['workingTime'] ?? 'ไม่ระบุ') . " ปี " . htmlspecialchars($_POST['workingYear'] ?? 'ไม่ระบุ') . " เดือน " . htmlspecialchars($_POST['workingMonth'] ?? 'ไม่ระบุ') . "</p>";
} else {
    echo "<p>ไม่มีข้อมูลส่งมา</p>";
}
?>
