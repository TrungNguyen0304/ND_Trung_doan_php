<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";
$user = showAllUsers();


?>
<!DOCTYPE html>
<?php include_once("../includes/head.php") ?>
                <h1 class="fs-3 text-warning">Trang user <a href="../index.php"><i class="fa-solid fa-house"></i></a></h1>

                <a href="./create.php" class="btn btn-primary d-inline-flex"><i data-lucide="badge-plus"></i>Thêm</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên</th>
                       
                            <th>gmail</th>
                            <th>mật khẩu</th>
                            <th>địa chỉ</th>
                            <th>phone</th>
                            <th>##</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $cat) { ?>
                            <tr>
                                <td><?php echo $cat['index'] ?></td>
                                <td><?php echo $cat['id'] ?></td>
                                <td><?php echo $cat['name'] ?></td>
                                <td><?php echo $cat['email'] ?></td>
                                <td><?php echo $cat['password'] ?></td>
                                <td><?php echo $cat['address'] ?></td>
                                <td><?php echo $cat['phone'] ?></td>
                                <td>
                                    <a href="./edit.php?id=<?php echo $cat['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                    <a href="./delete.php?id=<?php echo $cat['id'] ?>" class="btn btn-danger"><i data-lucide="trash"></i></a>

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <?php include_once("../includes/footer.php") ?>