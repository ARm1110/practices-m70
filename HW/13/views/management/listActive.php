<?php

// var_dump($result[0]['statuse']);
// exit;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">status</th>
            <th scope="col">Process</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0, $j = 1; $i < count($result); $i++, $j++) { ?>
            <tr>
                <th scope="row"><?php echo $j ?></th>
                <td>
                    <?php echo $result[$i]['email'] ?>
                </td>
                <td><?php echo $result[$i]['statuse'] ? 'active'  : 'disabled'; ?></td>
                <td><?php if ($result[$i]['statuse'] == true) { ?>
                        <a href="/management/account/disable/management?id=<?php echo $result[$i]['id'] ?>" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg></a>
                    <?php } else { ?>
                        <a href="/management/account/active/management?id=<?php echo $result[$i]['id'] ?>" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg></a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>


    </tbody>
</table>