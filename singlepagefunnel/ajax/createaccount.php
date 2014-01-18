<?php
require_once '/Applications/MAMP/Swift-5.0.3/lib/swift_required.php';
$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername("markdhansen@gmail.com")
  ->setPassword("Karma8691");
$mailer = Swift_Mailer::newInstance($transporter);
$message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject('Your subject')

  // Set the From address with an associative array
  ->setFrom(array('markdhansen@gmail.com' => 'Mark Hansen'))

  // Set the To addresses with an associative array
  ->setTo(array('mark@hansen5.com', 'mark@megalytic.com'))

  // Give it a body
  ->setBody('Your verification code for GA Examples: ' . 'dfgrt');

// Send the message
$mailingResult = $mailer->send($message);
error_log("mailingResult = " . $mailingResult);


$success = false;
$verificationcode = "";
$failureMsg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // error_log('$_POST = ' . print_r($_POST, true));
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $conn = new mysqli("localhost", "gaexamples", "daint4toot", "gaexamples", 8889);
        if ($conn->connect_errno) {
            error_log(sprintf("Connect failed (%s): %s\n", $conn->connect_errno, $conn->connect_error));
        } else {
            // check if username already exists
            $sqlUsername = "SELECT * FROM singlepagefunnel WHERE username = ?";
            $stmt = $conn->prepare($sqlUsername);
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $failureMsg = "Username already exists: " . $_POST['username'];
            } else {
                // check if email already exists
                $sqlEmail = "SELECT * FROM singlepagefunnel WHERE email = ?";
                $stmt = $conn->prepare($sqlEmail);
                $stmt->bind_param('s', $_POST['email']);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $failureMsg = "Email already exists: " . $_POST['email'];
                } else {
                    // insert new account
                    $sql = "INSERT INTO singlepagefunnel VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    // generate random 5 character verification code
                    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $verificationcode = '';
                    for ($i = 0; $i < 5; $i++) {
                        $verificationcode .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    $stmt->bind_param('ssss', $_POST['username'], $_POST['email'], $_POST['password'], $verificationcode);
                    $success = $stmt->execute();
                }
            }
            mysqli_close($conn);
        }
    }
}
echo json_encode(array('success' => $success, 'verificationcode' => $verificationcode, 'failureMsg' => $failureMsg));
?>
