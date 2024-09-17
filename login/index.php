<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPREC BEM FIKTI UG</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images_general/bemfikti.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/index.css">
</head>

<body>
    <div class="frames">
        <div class="glassmorph">
            <div class="container-fluid" style="color: black !important; font-weight: 600;">
                <h1 class="caption text-center pt-3">Login</h1>
                <center>
                    <form method="POST" autocomplete="off" novalidate class="row col-lg-8 col-md-12 col-12 g-3 needs-validation"
                        action="<?php echo htmlspecialchars("../config/proses-login.php");?>" validate
                        style="text-align: left !important;">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="validationCustom01" oninvalid="this.setCustomValidity('Masukkan Email yang sesuai')" autofocus required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="validationCustom02" minlength="1" maxlength="30" oninvalid="this.setCustomValidity('Masukkan Password yang sesuai')" oninput="this.setCustomValidity()" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <span>Don't have an account ? register <a href="../register/"> here </a></span>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>