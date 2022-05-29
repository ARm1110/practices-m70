<div class="row">
    <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
        <div class="col-12">
            <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Appointment form</h3>
        </div>
        <form action="/doctor-list/profile/appointment" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="firstName" value="<?php echo $user[0]['firstName']; ?>" disabled placeholder="First Name">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lastName" value="<?php echo $user[0]['lastName']; ?>" disabled placeholder="Last Name">
                </div>
                <div class="col-md-6">
                    <input type="tel" class="form-control" name="email" value=" <?php echo $user[0]['email']; ?>" disabled placeholder="Phone Number">
                </div>
                <input type="hidden" name="doctorID" value="<?php echo $doctor[0]['id'];  ?>" />
                <div class="col-12">
                    <select class="form-select" name="worktimeID">
                        <option disabled selected>select day and time visit:</option>
                        <?php for ($i = 0; $i < count($doctor); $i++) { ?>
                            <option value="<?php echo $doctor[$i]['worktID'] ?>"><?php echo $doctor[$i]['start_worktime'] . ' at ' . $doctor[$i]['end_worktime'] . ' day ' . ':' . $doctor[$i]['week_days']; ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="col-12">
                    <select class="form-select " name="clinicID">
                        <option disabled selected>select section part:</option>
                        <?php for ($i = 0; $i < count(($doctor)); $i++) { ?>
                            <option value="<?php echo $doctor[$i]['clinicID'] ?>"><?php echo $doctor[$i]['clinicName']; ?></option>
                        <?php break;
                        } ?>

                    </select>
                </div>
                <div class="col-12">
                    <textarea class="form-control" name="reason" placeholder="Message"></textarea>
                </div>
                <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary float-end">Appointment</button>
                    <a type="button" href="/DoctorList" class="btn btn-outline-secondary float-end me-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>