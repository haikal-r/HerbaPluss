<?php 
    require './config/auth-register.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css" />

    <!-- Style External -->
    <link rel="stylesheet" href="./assets/css/login-styles.css">
</head>
<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box p-5 h-auto d-flex align-items-center" style="width: 450px;">
            <form class="d-flex flex-column w-100" method="post" >
                <div class="text-center">
                    <img src="./assets/HerbaPluss.svg" class="pt-3 pb-4 "/>
                </div>
                <div class="py-3">
                    <h1>Email</h1>
                    <input type="email" class="form-control" name="email" required/>
                </div>
                <div class="pb-3">
                    <h1>Alamat</h1>
                    <input type="text" class="form-control" name="alamat" required/>
                </div>
                <div class="pb-3">
                    <h1>Username</h1>
                    <input type="text" class="form-control" name="username" required/>
                </div>
                <div class="pb-3">
                    <h1>Password</h1>
                    <input type="password" class="form-control" name="password" required/>
                </div>
                <div class="pb-3">
                    <h1>Role</h1>
                    <select name="role" class="form-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="pembeli">Pembeli</option>
                        <option value="penjual">Penjual</option>    
                    </select>
                </div>
                <div class="pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="./login.php" class="create-account me-5">Allready have account?</a>
                        <button class="btn form-control text-white ms-2" type="submit" name="register">Next</button>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>