<?php

session_start();
include "./inc/connect.php";

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];

$sql = "SELECT * FROM user_data WHERE name = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_data'] = $row;
} else {
    echo "Data not found.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username; ?> | Profile</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <?php
    include_once "inc/all_css.php";
    ?>

</head>

<body>

    <?php
    include_once "inc/header.php";
    ?>


    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Edit Your Business Profile
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Location</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social">Social Links</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">

                            <hr class="border-light m-0">
                            <div class="card-body">

                                <?php

                                if (isset($_SESSION['user_data'])) {
                                    $user_data = $_SESSION['user_data'];

                                    echo '<div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control mb-1" value=' . $user_data['name'] . ' readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control mb-1" placeholder=' . $user_data['email'] . ' readonly>
                                    </div>';
                                } else {
                                    echo "User data not found in the session.";
                                }
                                ?>
                                <div class="form-group">
                                    <label class="form-label">Ownership</label>
                                    <input type="text" class="form-control" placeholder="Ownership" id="owner_name">
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Business Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Business Name" id=business_name value="<?php echo  $user_data['business']?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" rows="2" id="business_bio"><?php echo  $user_data['bio']?></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Type of Business</label>
                                    <select class="custom-select" id="business_type">
                                        <option selected>...</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="Corporation">Corporation</option>
                                        <option value="Nonprofit">Nonprofit</option>
                                        <option value="Large businesses">Large businesses</option>
                                        <option value="Limited liability company">Limited liability company</option>
                                        <option value="Other business structure">Other business structure</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Your Phone Number" id="phone_number" value="<?php echo  $user_data['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" id="web_address" value="<?php echo  $user_data['web']?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St" id="address_one" value="<?php echo  $user_data['address_one']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address 2</label>
                                    <input type="text" class="form-control" placeholder="Apartment, Studio or floor" id="address_two" value="<?php echo  $user_data['address_two']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" value="<?php echo  $user_data['city']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">ZIP Code</label>
                                    <input type="text" class="form-control" id="zip" value="<?php echo  $user_data['zip_code']?>">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-social">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" placeholder="facebook.com/yourname" id="link_facebook" value="<?php echo  $user_data['facebook']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" placeholder="linkedin.com/in/yourname" id="link_linkedin" value="<?php echo  $user_data['linkedin']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" placeholder="instagram.com/yourname" id="link_instagram" value="<?php echo  $user_data['instagram']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">X | Twitter</label>
                                    <input type="text" class="form-control" placeholder="twitter.com/yourname" id="link_twitter" value="<?php echo  $user_data['twitter']?>">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" name="save_changes" id="save-changes" class="btn btn-primary" style="background-color: #3B4A6B; border:1px #3B4A6B;">Save changes</button>&nbsp;
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#save-changes').click(function() {
                var owner = $('#owner_name').val();
                var business = $('#business_name').val();
                var bio = $('#business_bio').val();
                var type = $('#business_type').val();
                var phone = $('#phone_number').val();
                var web = $('#web_address').val();
                var address_one = $('#address_one').val();
                var address_two = $('#address_two').val();
                var city = $('#city').val();
                var zip_code = $('#zip').val();
                var facebook = $('#link_facebook').val();
                var linkedin = $('#link_linkedin').val();
                var instagram = $('#link_instagram').val();
                var twitter = $('#link_twitter').val();

                $.ajax({
                    url: 'save_profile.php',
                    method: 'POST',
                    data: {
                        owner: owner,
                        business: business,
                        bio: bio,
                        type: type,
                        phone: phone,
                        web: web,
                        address_one: address_one,
                        address_two: address_two,
                        city: city,
                        zip_code: zip_code,
                        facebook: facebook,
                        linkedin: linkedin,
                        instagram: instagram,
                        twitter: twitter
                    },
                    dataType: 'json',
                    success: function(response) {
                        // if (response.success) {
                        //     alert('Changes saved successfully!');
                        //     // location.reload();
                        // } else {
                        //     alert('Error saving changes. Please try again.');
                        // }

                        console.log(response);

                    },
                    error: function(error) {
                        console.error('Error saving changes:', error);
                    }
                });
            });

        })
    </script>

    <?php
    include_once "inc/all_scripts.php";
    ?>


</body>

</html>




</body>

</html>