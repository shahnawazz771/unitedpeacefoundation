<?php
  include_once("db.php");

  if(isset($_POST['contact_action'])){
    // Insert into database
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO contact_us (name, phone, email, message) VALUES ('".mysqli_real_escape_string($conn, $name)."', '".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $message)."')";
    $result = $conn->query($sql);

    // Send email
    $to = 'info@unitedpeacefoundation.in';
    $subject = 'United Peace Foundation Query';
    $body = '
      <html>
        <head>
          <meta name="viewport" content="width=device-width" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        </head>
        <body>
          <table bgcolor="#fafafa" style=" width: 100%!important; height: 100%; background-color: #fafafa; padding: 20px; font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, "Lucida Grande", sans-serif;  font-size: 100%; line-height: 1.6;">
            <tr>
              <td></td>
              <td bgcolor="#FFFFFF" style="border: 1px solid #eeeeee; background-color: #ffffff; border-radius:5px; display:block!important; max-width:600px!important; margin:0 auto!important; clear:both!important;">
                <div style="padding:20px; max-width:600px; margin:0 auto; display:block;">
                  <table style="width: 100%;">
                    <tr>
                      <td><p style="text-align: center; display: block;  padding-bottom:20px;  margin-bottom:20px; border-bottom:1px solid #dddddd;"><img style="width:200px;" src="https://unitedpeacefoundation.in/img/trust-logo.jpg"/></p>
                      <h1 style="font-weight: 200; font-size: 36px; margin: 20px 0 30px 0; color: #333333;">Contact information.</h1>
                      <p style="margin-bottom: 10px; font-weight: normal; font-size:16px; color: #333333;"><b>Name</b> : '.$name.'</p>
                      <h2 style="font-weight: 200; font-size: 16px; margin: 20px 0; color: #333333;"><b>Phone</b> : '.$phone.' </h2>
                      <h2 style="font-weight: 200; font-size: 16px; margin: 20px 0; color: #333333;"><b>Email</b> : '.$email.' </h2>
                      <h2 style="font-weight: 200; font-size: 16px; margin: 20px 0; color: #333333;"><b>Message</b> : '.$message.' </h2>
                      <p style="text-align: center; display: block; padding-top:20px; font-weight: bold; margin-top:30px; color: #666666; border-top:1px solid #dddddd;">United Peace Foundation</p></td>
                    </tr>
                  </table>
                </div>
              </td>
              <td></td>
            </tr>
          </table>
        </body>
      </html>
    ';
    $headers = 'MIME-Version: 1.0'. "\r\n";
    $headers.= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
    $headers.= 'From: Your Name <your_email@example.com>'. "\r\n";
    mail($to, $subject, $body, $headers);

    // Close database connection
    $conn->close();
  }
?>