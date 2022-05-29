<?php
// var_dump($result);
// exit;
?>

<h3>Add section :</h3>
<div class="input-group">
    <div class="d-flex flex-row">
        <div>
            <form action="/management/add/section" method="post">
                <input type="text" name="clinic" class="form-control" aria-label="Text input with segmented dropdown button">
        </div>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split " data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><button type="submit" class="dropdown-item">Add</button></li>
            <li><a class="dropdown-item" href="#">exit</a></li>
        </ul>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">section name</th>
                <th scope="col">capacity</th>
                <th scope="col">process</th>
                <th scope="col">rename</th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0, $j = 1; $i < count($result); $i++, $j++) {  ?>
                <tr>
                    <th scope="row"><?php echo $j ?></th>
                    <td><?php echo $result[$i]['name'] ?></td>
                    <td><?php echo $result[$i]['creat_at'] ?></td>
                    <td>
                        <a href="/management/section/delete?id=<?php echo $result[$i]['id'] ?>" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>

                        </a>

                    </td>
                    <td>
                        <form action="/management/section/rename" method="post">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>


                            </button>
                            <input type="hidden" name="clinic_id" value="<?php echo $result[$i]['id'] ?>">
                            <input type="text" name="clinicName" placeholder="rename...">
                        </form>
                    </td>
                </tr>

            <?php } ?>




        </tbody>
    </table>
</div>