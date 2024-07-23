<?php include('include/header.php');
include('../functions/myfunctions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Login</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>fullname</th>
                                <th>mobile</th>
                                <th>username </th>
                                <th>email </th>
                                <th>password</th>
                            </tr>
                        </thead>
                        <?php
                                $users = getResult('users');

                                if(mysqli_num_rows($users) > 0)
                                {
                                    foreach($users as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['fullname']; ?></td>
                                                <td> <?= $item['mobile']; ?></td>
                                                <td> <?= $item['username']; ?></td>
                                                <td> <?= $item['email']; ?></td>
                                                <td> <?= $item['password']; ?></td>


                                                <td>
                                                    <form action="code.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                    </form>
                                                </td>       
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }
                                ?>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>