<?php if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD1'] == 'POST') {

        $parser = file_get_contents("user.json");
        $decode_details = json_decode($parser, true);
        
        function cleanUsersTextInput($data) { 
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $email = cleanUsersTextInput($_POST['email']);
        $password = cleanUsersTextInput($_POST['password']);
        
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "Email or password is empty";
            exit();
        }
        
        else {
            
            $user = null;
            $mail = null;
            
            
            foreach ($decode_details['users'] as $result) {
                
                if ($result['email'] === $email && $result['password'] === $password) {
                    $user = $result['username'];
                    $mail = $result['email'];
                }
            }

            if (!$user && !$mail) {
                echo "Invalid login details, please try again!";
                exit();
            } else {

                echo "Login Successful! You Made It To CodeStrong";
            }
        }
