<?php
include 'config.php';
include_once(ROOT_PATH . '/includes/header.php');
?>
<title>Sign Up</title>
</head>

<body>
    <main class="" style="height:100vh;padding:50px 0 0 0 ;">
        <div class="container" style="position:relative;">
            <div class=" row col-md-5 col-md-offset-3 card shadow-lg p-4 mb-5 bg-white rounded" style="margin:auto;">
                <div class="panel panel-primary" style="padding:20px;">
                    <div class="panel-heading text-right">
                        <a href="<?php echo BASE_URL . "/index.php" ?>" style="color:green; text-align:justify;">
                            < Home</a>
                    </div>
                    <div style="display: flex; width:100%; justify-content:center; align-items:center; margin:-20px 0 10px 0;">
                        <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="logo" style="width:130px; height:130px;">
                    </div>
                    <div class="panel panel-body">
                        <form>
                            <div class="form-group">
                                <label for="idNumber">National ID Number</label>
                                <input type="text" class="form-control" id="idNumber" placeholder="Enter your National ID Number">
                            </div>
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter your First Name">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter your Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="department">Institution</label>
                                <input type="text" class="form-control" id="Department" placeholder="Enter your Department">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your Password">
                            </div>
                            <div class="text-right" style="border-radius:20%;">
                                <input name="signUpBtn" type="submit" value="Sign Up" class="btn btn-primary" style="color:white; background-color:green;">
                            </div>
                        </form>
                    </div>
                    <div class="panel panel-footer text-center">
                        <small>Have an account : <a href="<?php echo BASE_URL . "/login.php" ?>" > Sign In </a> </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-footer text-center" style="position: relative;bottom: 0;width: 100%;text-align: center; padding-bottom:30px;">
            <large>JKUAT &copy; 2022. All Rights Reserved.</large>
        </div>
    </main>

</body>

</html>