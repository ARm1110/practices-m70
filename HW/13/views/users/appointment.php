<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">doctor name</th>
            <th scope="col">clinic</th>
            <th scope="col">visit day</th>
            <th scope="col">visit time</th>
            <th scope="col">payment</th>
            <th scope="col">status</th>
            <th scope="col">reason</th>
            <th scope="col">proses</th>
        </tr>
    </thead>

    <tbody>
        <?php for ($i = 0, $j = 1; $i < count($result); $i++, $j++) { ?>
            <tr>
                <th scope="row"><?php echo $j ?></th>
                <td><?php echo $result[$i]['firstName'] . " " . $result[$i]['lastName'] ?></td>
                <td><?php echo $result[$i]['name'] ?></td>
                <td><?php echo $result[$i]['week_days'] ?></td>
                <td><?php echo $result[$i]['start_worktime'] . " - " . $result[$i]['end_worktime'] ?></td>
                <td><?php echo $result[$i]['pay_a']; ?></td>
                <td><?php echo $result[$i]['statuse'] ? 'accept' : 'padding';  ?></td>
                <td><?php echo $result[$i]['reason'] ?></td>
                <td>
                    <?php if ($result[$i]['statuse'] == 0) { ?>
                        <a href="<?php echo '/users/delete?id=' . $result[$i]['id'] ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></a>
                    <?php } else { ?>
                        <a href="<?php echo '/users/pay?id=' . $result[$i]['id'] ?>" class="btn btn-success">accept</a>
                    <?php } ?>

                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>