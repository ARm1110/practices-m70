<?php

use App\core\Application;
?>
<?php if (isset($_GET['errorW'])) { ?>
    <div class="position-absolute top-0 mt-5 start-50 translate-middle">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <?php echo $_GET['errorW']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
    <div class="position-absolute top-0 mt-5 start-50 translate-middle">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <?php echo $_GET['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>


<?php
// var_dump($data2[2]);
// exit;
// var_dump('http://'.$_SERVER ["HTTP_HOST"])  
?>
<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">

                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img src="<?php echo 'http://127.0.0.1:8000' . "/uploads/" . $data[0]['url_picture'] ?>" class="rounded" alt="not load" width='140px' height="140"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <form class="form" action="" method="POST" enctype=' multipart/form-data'>
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $data[0]['firstName'] . ' ' . $data[0]['lastName'] ?></h4>
                                                <div class="mt-2">
                                                    <input type="text" name='imgID' value="<?php echo $data[0]['imgID'] ?>" hidden />
                                                    <input type="file" id="actual-btn" name='file' hidden />
                                                    <label for="actual-btn" type='file' class="btn btn-primary">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        Change Photo
                                                    </label>
                                                    <button class="btn btn-success" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>-
                                        <div class="text-center text-sm-right">
                                            <span class="badge badge-secondary"><?php echo $data[0]['ed_info'] ?></span>
                                            <div class="text-muted"><small>Join At <?php echo $data[0]['creat_at'] ?></small></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">

                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input class="form-control" type="text" disabled name="firstName" value="<?php echo $data[0]['firstName'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input class="form-control" type="text" disabled name="lastName" value="<?php echo $data[0]['lastName'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="text" disabled name=email value='<?php echo $data[0]['email'] ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                <div class="mb-2"><b>clinic sitting</b></div>
                                                <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                    <div class=" form-group">
                                                        <form action="/dashboard/doctor/change-clinic-section" method="POST">
                                                            <div class="mb-2"><b>clinic change data</b></div>
                                                            <select class="form-select" name="clinic" multiple aria-label="multiple select example">
                                                                <option disabled selected>select one section</option>
                                                                <?php for ($i = 0; $i < count($data2); $i++) { ?>
                                                                    <option value="<?php echo $data2[$i]['id']; ?>"><?php echo $data2[$i]['name']; ?></option>
                                                                <?php } ?>

                                                            </select>
                                                            <div class="col-5 col-sm-5 offset-sm-1 mt-3">
                                                                <button type="submit" class="btn btn-warning" type="submit">Change</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                <div class="mb-2"><b>clinic set now </b></div>
                                                <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                    <div class=" form-group">
                                                        <div class="mb-2"><b>clinic name:</b></div>
                                                        <select class="form-select" name="start_worktime">
                                                            <option disabled selected><?php echo $data[0]['name'] ?></option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                <div class="mb-2"><b>add more time</b></div>
                                                <div class="col-5 col-sm-5 mt-2 offset-sm-1 mb-3">
                                                    <div class=" form-group">
                                                        <form action="/dashboard/doctor/add-time" method="post">
                                                            <div class="mb-2"><b>Time of work</b></div>
                                                            <select class="form-select" name="start_worktime" multiple aria-label="multiple select example">
                                                                <option disabled selected>Select time</option>
                                                                <option value="17:00">17:00</option>
                                                                <option value="08:00">08:00</option>
                                                                <option value="15:00">15:00</option>
                                                            </select>
                                                            <div class="mb-2"><b>At</b></div>
                                                            <select class="form-select" name="end_worktime" multiple aria-label="multiple select example">
                                                                <option disabled selected>Select time</option>
                                                                <option value="21:00">21:00</option>
                                                                <option value="12:00">12:00</option>
                                                                <option value="18:00">18:00</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-sm-5 offset-sm-1 mb-3">
                                                    <div class="mb-2"><b>Days of work</b></div>
                                                    <div class=" form-group">
                                                        <select class="form-select form-select-md mb-3" name="days" aria-label=".form-select-lg example">
                                                            <option disabled selected>Select Days</option>
                                                            <option value="saturday">Saturday</option>
                                                            <option value="sunday">Sunday</option>
                                                            <option value="monday">Monday</option>
                                                            <option value="tuesday">Tuesday</option>
                                                            <option value="wednesday">Wednesday</option>
                                                            <option value="thursday">Thursday</option>
                                                            <option value="friday">Friday</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-sm-5 offset-sm-1 mb-3">
                                                    <button type="submit" class="btn btn-warning" type="submit">Add time</button>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="col-6 col-sm-5 offset-sm-1 mb-3">
                                                <div class="mb-2"><b>Time Set Now</b></div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">start</th>
                                                            <th scope="col">end</th>
                                                            <th scope="col">day</th>
                                                            <th scope="col">del</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0, $j = 1; $i < count($data); $i++, $j++) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $j; ?></th>
                                                                <td><?php echo $data[$i]["start_worktime"]; ?></td>
                                                                <td><?php echo $data[$i]["end_worktime"]; ?></td>
                                                                <td><?php echo $data[$i]["week_days"]; ?></td>
                                                                <td><a type="button" class="btn btn-danger" href="/dashboard-doctor/delete-work-day?workTimeID=<?php echo $data[$i]['workID'] ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col-2 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>-->
                                        </div>

                                        </form>