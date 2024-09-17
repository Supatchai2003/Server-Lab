<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Country Files</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" name="submit" value="ค้นหาชื่อประเทศ">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // รายชื่อประเทศในโซนเอเชีย
        $asian_countries = ["afghanistan", "armenia", "azerbaijan", "bahrain", "bangladesh", "bhutan", "brunei", "cambodia", 
        "china", "cyprus", "georgia", "india", "indonesia", "iran", "iraq", "israel", "japan", "jordan", 
        "kazakhstan", "kuwait", "kyrgyzstan", "laos", "lebanon", "malaysia", "maldives", "mongolia", "myanmar", 
        "nepal", "north korea", "oman", "pakistan", "palestine", "philippines", "qatar", "russia", "saudi arabia", 
        "singapore", "south korea", "sri lanka", "syria", "taiwan", "tajikistan", "thailand", "timor-leste", 
        "turkey", "turkmenistan", "united arab emirates", "uzbekistan", "vietnam", "yemen"];

        // รายชื่อประเทศทั้งหมดที่ต้องการตรวจสอบ
        $all_countries = ["china", "japan", "north korea", "south korea", "india", "thailand", "vietnam", "malaysia", 
        "singapore", "indonesia", "philippines", "united states", "canada", "mexico", "brazil", "argentina", 
        "united kingdom", "france", "germany", "italy", "spain", "russia", "australia", "new zealand"];
        
        $countries = [];

        // กำหนดเส้นทางไปยังโฟลเดอร์ที่เก็บไฟล์
        $folder = 'C:\xampp\htdocs\test\Document\\';
        
        // อ่านทุกไฟล์ที่อยู่ในโฟลเดอร์และมีนามสกุล .txt
        $files = glob($folder . '*.txt');

        // อ่านไฟล์จากโฟลเดอร์
        foreach ($files as $file) {
            if (file_exists($file)) {
                $fileContent = file_get_contents($file);
                
                // ค้นหาชื่อประเทศโดยไม่คำนึงถึงตัวพิมพ์ใหญ่หรือตัวพิมพ์เล็ก
                preg_match_all('/\b[A-Za-z]+\b/', $fileContent, $matches);
                
                foreach ($matches[0] as $match) {
                    // แปลงชื่อประเทศเป็นตัวพิมพ์เล็กเพื่อให้สามารถตรวจสอบได้
                    $lowercaseMatch = strtolower($match);
                    
                    // ตรวจสอบว่าชื่อตรงกับประเทศในรายการที่กำหนดหรือไม่
                    if (in_array($lowercaseMatch, $all_countries)) {
                        $countries[] = ucfirst($lowercaseMatch);  // แปลงให้ตัวอักษรตัวแรกเป็นพิมพ์ใหญ่สำหรับการแสดงผล
                    }
                }
            }
        }

        // ลบชื่อประเทศที่ซ้ำกันและเรียงลำดับตามตัวอักษร
        $countries = array_unique($countries);
        sort($countries);

        // แยกประเทศตามโซนเอเชียและโซนอื่นๆ
        $asian = [];
        $others = [];
        foreach ($countries as $country) {
            $lowercaseCountry = strtolower($country);
            if (in_array($lowercaseCountry, $asian_countries)) {
                $asian[] = $country;
            } else {
                $others[] = $country;
            }
        }

        // แสดงรายชื่อประเทศที่อยู่ในโซนเอเชีย
        echo "<h2>Asian Countries</h2>";
        echo "<ul>";
        foreach ($asian as $country) {
            echo "<li>$country</li>";
        }
        echo "</ul>";

        // แสดงรายชื่อประเทศที่อยู่ในโซนอื่นๆ
        echo "<h2>Other Countries</h2>";
        echo "<ul>";
        foreach ($others as $country) {
            echo "<li>$country</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
