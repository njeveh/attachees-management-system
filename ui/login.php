<?php
include 'config.php';
include_once(ROOT_PATH . '/includes/header.php');
?>
<title>Sign In</title>
</head>

<body>
    <main class="" style="height:100vh;padding:50px 0 0 0 ;">
        <div class="container" style="position:relative;">
            <div class="row col-md-4 col-md-offset-3 card shadow-lg p-4 mb-5 bg-white rounded" style="margin:auto;">
                <div class="panel panel-primary">
                    <div class="panel-heading text-right">
                        <a href="<?php echo BASE_URL . "/index.php" ?>" style="color:green; text-align:justify;">
                            < Home</a>
                    </div>
                    <div style="display: flex; width:100%; justify-content:center; align-items:center; margin-top:-20px 0 10px 0">
                        <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="logo" style="width:130px; height:130px;">
                    </div>
                    <div class="panel panel-body">
                        <form>
                            <div class="form-group">
                                <label for="userName">Username</label>
                                <input type="text" class="form-control" id="userName" placeholder="Enter your Username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div style="margin:20px 5px;display: flex; flex-direction:row; justify-content:space-between; align-items:center;">
                                <div>
                                    <small><a href="#"> Forgot your password?</a></small>
                                </div>
                                <div class="text-right">
                                    <input name="signinBtn" type="submit" value="Login" class="btn btn-primary" style="color:white; background-color:green;" class="panel text-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-footer text-center">
                    <small>Don't have an account : <a href="<?php echo BASE_URL . "/register.php" ?>"> Register </a> </small>
                </div>
            </div>
        </div>
        <div class="panel panel-footer text-center" style=" position: absolute;bottom: 0;width: 100%;text-align: center; padding-bottom:30px;">
            <large>JKUAT &copy; 2022. All Rights Reserved.</large>
        </div>
    </main>

</body>

</html>