<style>
    body {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php if (!isset($data[0]["firstName"]) || !isset($data[0]["lastName"])) {
                            echo 'none';
                        } else {
                            echo $data[0]["firstName"] . ' ' . $data[0]["lastName"];
                        } ?>
                    </h5>
                    <h6>
                        <?php echo $data[0]["ed_info"] ?? 'none'; ?>
                    </h6>


                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#menu1">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>social media</p>
                    <a href="">Telegram</a><br />
                    <a href="">Twith</a><br />
                </div>
                <div class="profile-work">
                    <p>work time</p>
                    <a href=""><?php echo $data[0]["start_worktime"] ?? 'none'; ?></a><br />
                    <a href=""><?php echo $data[0]["end_worktime"] ?? 'none'; ?></a>
                    <p>work days</p>
                    <a href=""><?php echo $data[0]["week_days"] ?? 'none'; ?></a><br />
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="menu2" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>xxxxxx</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?php echo $data[0]["firstName"] ?? 'none'; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]["email"] ?? 'none'; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]["phone_number"] ?? 'none'; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>visit cost</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php
                                    if (!isset($data[0]["amount_visit"])) {
                                        echo 'none';
                                    } else {
                                        echo '$' . number_format($data[0]["amount_visit"], 2);
                                    } ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]["name"] ?? 'none'; ?></p>
                            </div>
                        </div>
                        <a type="submit" href="/DoctorList/Profile/appointment?id=<?php echo $data[0]["id"]; ?>" class="btn  btn-outline-success">Reservation</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>