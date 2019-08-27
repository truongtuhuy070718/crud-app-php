<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'bootstrap/css.html';?>
    <title>Login</title>
</head>
<body>
    <div class="text-center">
        <h1>Login To DashBoard</h1>
    </div>
    <hr>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name ="pass">
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember ME</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-center">Submit</button>
            </div>
        </form>
    </div>
    </body>
</html>