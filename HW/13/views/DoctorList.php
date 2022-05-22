<?php
$flagButton = true;
$namePart = [];
for ($i = 0, $j = 1; $i < count($data[0]); $i++, $j++) {
    $namePart[] = $data[0][$i]['name'];
}
$correct = array_unique($namePart);
?>
<form action="/DoctorList/Search" method="POST" class="">
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg" name="search" placeholder="Search Here">
        <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i> Search</button>

    </div>
</form>

<form action="/DoctorList/Filter" method="POST" class="">
    <select class="btn btn-outline-info dropdown-toggle" name="filter" data-toggle="dropdown">
        <option selected disable>Filter..</options>

            <?php foreach ($correct as $value) { ?>
        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php   } ?>
    </select>
    <input type="submit" name="submit" value="Go" class="btn btn-outline-success"></input>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profile</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">status</th>
            <th scope="col">Clinic Activity</th>
            <th scope="col">Process</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0, $j = 1; $i < count($data[0]); $i++, $j++) { ?>
            <tr>
                <th scope="row"><?php echo $j; ?></th>
                <td>
                    <img class="img-fluid" src="../uploads/img_profile/avatar7.png" alt="" width="40">
                </td>
                <td><?php echo $data[0][$i]["firstName"]; ?></td>
                <td><?php echo $data[0][$i]['lastName']; ?></td>
                <td><?php if ($data[0][$i]['statuse'] == 1) {
                        echo "accept";
                    } else {
                        echo "pending";
                        $flagButton = false;
                    }
                    ?></td>
                <td><?php echo $data[0][$i]['name']; ?></td>
                <td><?php if ($flagButton == false) { ?>

                        <button class="btn btn-danger" disabled>
                            <span class="spinner-border spinner-border-sm"></span>
                            pending..
                        </button><?php } else { ?>
                        <form method="POST" action="/DoctorList/Profile">
                            <input type="submit" class="btn  btn-outline-success" value="select" href="/DoctorList/seeProfile"></input>
                            <input type="text" hidden name="id" value="<?php echo $data[0][$i]['id']; ?>"></input>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php $flagButton = true;  } ?>


    </tbody>
</table>