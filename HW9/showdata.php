<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "dbhw9";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ฟังก์ชันสำหรับล็อกอิน
function login($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['user_Password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if ($password == $user['password1']) { 
                $_SESSION['username'] = $user['username'];
                $_SESSION['role1'] = $user['role1'];
                header('Location: showdata.php');
                exit;
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User not found!";
        }
    }
}

// ฟังก์ชันสำหรับสมัครสมาชิก
function register($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password1']; 
        $confirm_password = $_POST['confirm_password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $province = $_POST['province'];
        $email = $_POST['email'];

        if ($password != $confirm_password) {
            echo "Passwords do not match!";
            exit;
        }

        $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
        $check_email_result = $conn->query($check_email_sql);

        if ($check_email_result->num_rows > 0) {
            echo "Email already exists!";
        } else {
            $sql = "INSERT INTO users (username, password1, firstname, lastname, gender, age, province, email, role1) 
                    VALUES ('$username', '$password', '$firstname', '$lastname', '$gender', $age, '$province', '$email', 'Customer')";

            if ($conn->query($sql) === TRUE) {
                header('Location: showdata.php');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// ฟังก์ชันแสดงข้อมูลผู้ใช้หลังจากล็อกอิน
function showData($conn) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $role = $_SESSION['role1'];

        echo "<h1>Welcome, $username</h1>";
        echo "<p>You are logged in as: $role</p>";

        // แสดงข้อมูลตามบทบาท
        if ($role == 'Admin') {
            echo "<h2>All Customers</h2>";

            $sql = "SELECT id, username, firstname, lastname, gender, age, province, email FROM users WHERE role1 = 'Customer'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                    <tr><th>ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Age</th><th>Province</th><th>Email</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['province']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='showdata.php?edit={$row['id']}'>Edit</a> |
                            <a href='showdata.php?delete={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this customer?\");'>Delete</a>
                        </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No customers found.";
            }
        } else {
            // สำหรับลูกค้าแสดงข้อมูลตัวเองเท่านั้น
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                echo "<h2>Your Information</h2>";
                echo "<p><strong>First Name:</strong> {$user['firstname']}</p>";
                echo "<p><strong>Last Name:</strong> {$user['lastname']}</p>";
                echo "<p><strong>Gender:</strong> {$user['gender']}</p>";
                echo "<p><strong>Age:</strong> {$user['age']}</p>";
                echo "<p><strong>Province:</strong> {$user['province']}</p>";
                echo "<p><strong>Email:</strong> {$user['email']}</p>";
                echo "<a href='showdata.php?edit={$user['id']}'>Edit Your Information</a>";
            } else {
                echo "User information not found!";
            }
        }

        echo "<a href='showdata.php?logout=true'>Logout</a>";
    } else {
        header('Location: index.html');
        exit;
    }
}

// ฟังก์ชันสำหรับแสดงแบบฟอร์มแก้ไขข้อมูลลูกค้า
function editCustomer($conn, $id) {
    if (isset($_SESSION['username'])) {
        $role = $_SESSION['role1'];

        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $customer = $result->fetch_assoc();
            ?>
            <h2>Edit Information</h2>
            <form action="showdata.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $customer['firstname']; ?>" required><br>
                
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $customer['lastname']; ?>" required><br>
                
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?php if ($customer['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($customer['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                </select><br>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo $customer['age']; ?>" required><br>
                
                <label for="province">Province:</label>
                <input type="text" id="province" name="province" value="<?php echo $customer['province']; ?>" required><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $customer['email']; ?>" required><br>
                
                <input type="submit" name="update" value="Update">
            </form>
            <?php
        } else {
            echo "Customer not found!";
        }
    } else {
        echo "You do not have permission to edit customer data.";
    }
}

// ฟังก์ชันสำหรับอัปเดตข้อมูลลูกค้า
function updateCustomer($conn) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', gender='$gender', age=$age, province='$province', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// ฟังก์ชันสำหรับลบข้อมูลลูกค้า
function deleteCustomer($conn, $id) {
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// ตรวจสอบการทำงาน
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        login($conn);
    } elseif (isset($_POST['register'])) {
        register($conn);
    } elseif (isset($_POST['update'])) {
        updateCustomer($conn);
    }
} elseif (isset($_GET['edit'])) {
    editCustomer($conn, $_GET['edit']);
} elseif (isset($_GET['delete'])) {
    deleteCustomer($conn, $_GET['delete']);
    header('Location: showdata.php'); 
    exit;
} else {
    showData($conn);
}

$conn->close();
?>
