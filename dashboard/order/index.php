<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";
$orders =  showAllOrders();


?>
<?php include_once("../includes/head.php") ?>
                <h1 class="fs-3 text-warning">Trang danh mục orders<a href="../index.php"><i class="fa-solid fa-house"></i></a></h1>
                
                    <a href="./create.php" class="btn btn-primary d-inline-flex"><i data-lucide="badge-plus"></i>Thêm</a>
               
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tổng cộng</th>
                            <th>địa thoại</th>
                            <th>địa chỉ</th>
                            <th>##</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $cat) { ?>
                            <tr>
                                <td><?php echo $cat['index'] ?></td>
                                <td><?php echo $cat['id'] ?></td>
                                <td><?php echo $cat['tota'] ?></td>
                                <td><?php echo $cat['phone'] ?></td>
                                <td><?php echo $cat['address'] ?></td>
                                <td>
                                    <a href="./edit.php?id=<?php echo $cat['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                    <a href="./delete.php?id=<?php echo $cat['id'] ?>"class="btn btn-danger"><i data-lucide="trash"></i></a>
                                  
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <?php include_once("../includes/footer.php") ?>