<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W3CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .nav-item {
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="mt-4 d-flex align-items-center">
                    <img style="height: 30px; margin-right: 10px;" src="../img/logo1.png" alt="">
                    <img style="height: 30px;" src="../img/logo.png" alt="">
                </div>

                <ul class="nav flex-column" id="navList">

                    <?php
                        $names = ["Dashboard", "Courses", "Instructor", "Apps", "Charts", "Bootstrap", "Plugins", "Widget", "Forms", "Table", "Pages"];
                        $icons = ["bi-grid", "bi-book", "bi-person", "bi-info-circle", "bi-pie-chart", "bi-star", "bi-heart", "bi-gear-wide", "bi-file-earmark-check", "bi-file-earmark-spreadsheet", "bi-file-earmark-break"];
                        for ($i = 0; $i < count($names); $i++) {
                    ?>
                        <li class="nav-item p-3">
                            <i class="bi <?php echo $icons[$i]; ?> d-inline text-warning me-2"></i>
                            <a class="nav-link text-dark d-inline" href="#"><?php echo $names[$i]; ?></a>
                            <i class="bi bi-chevron-right d-inline text-warning"></i>
                        </li>
                    <?php
                        }
                    ?>
                </ul>

                <div class="mt-auto">
                    <p class="text-center text-muted">Made with <i class="bi bi-heart-fill text-danger"></i> by DexignZone</p>
                </div>
            </div>
            
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row justify-content-between p-3">
                            <div class="Dashboard d-inline col-md-4">
                                <i style="font-size: 30px; color: gray;" class="bi bi-list d-inline px-2"></i> 
                                <h2 class="d-inline" >Dashboard</h2>
                            </div>

                            <div class="searchh d-inline col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="bi bi-search"></i> </span>
                                <input type="text" class="form-control" placeholder="Tìm Kiếm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>



                        <div class="filter">
                            <div class="row justify-content-between p-3">
                                <div class="d-inline col-md-2">
                                    
                                    <p class="d-inline text-warning" >Filter</p>
                                </div>

                                <div class="d-inline col-md-2">
                                <i style="float: right;" class="bi bi-chevron-up bg-warning rounded-circle mr-2"></i>
                                </div>
                            </div>
                        </div>
                            <div class="row align-items-center">
                                <div class="form-group col-md-3">
                                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <input type="number" class="form-control" id="number" placeholder="Nhập số">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <select class="form-control" id="select">
                                        <?php
                                            for($i=1;$i<10;$i++)
                                            {
                                              
                                            
                                                echo "<option value='option1'>Lựa chọn " .$i. "</option>";
                                                
                                            }
                                        ?>

                                    </select>
                                </div>
                                
                                <button style="height: 40px; width: 100px;" type="button" class="btn btn-warning col-md-2 btn-sm mx-2 px-3">Delete</button>
                                <button style="height: 40px; width: 100px;" type="button" class="btn btn-warning col-md-2 btn-sm mx-2 px-3"> <a href="add_user.php">Add</a> </button>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">registration_date</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Deteil</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Kết nối đến cơ sở dữ liệu
                                        $servername = "localhost";
                                        $database = "cse";
                                        $username = "root";
                                        $password = "123";
                                        $conn = mysqli_connect($servername, $username, $password, $database);
                                        
                                        // Kiểm tra kết nối
                                        if (!$conn) {
                                            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                                        }
                                    

                                        $perPage = 10; // Số lượng dòng trên mỗi trang
                                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
                                        $offset = ($currentPage - 1) * $perPage;

                                        // Rest of your code...

                                        
                                        // Truy vấn dữ liệu từ bảng users
                                        $sql = "SELECT * FROM users LIMIT $perPage OFFSET $offset";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        // Lặp qua dữ liệu và hiển thị trong bảng
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['registration_date'] . "</td>";
                                            echo "<td><i class='bi bi-record-fill text-warning'></i></td>";
                                            echo "<td><a href='#'><i class='bi bi-shield-shaded'></i></a></td>";
                                            echo "<td><i class='bi bi-pen'></i></td>";
                                            echo "<td><i class='bi bi-trash3'></i></td>";
                                            echo "</tr>";
                                        }
                                        
                                        // Đóng kết nối cơ sở dữ liệu
                                        
                                        ?>
                                    </tbody>
                                </table>
                                    <!-- Phân trang -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <!-- Số trang và liên kết sẽ được tạo ra ở đây -->
                                            <?php
                                            $countSql = "SELECT COUNT(*) AS total FROM users";
                                            $countResult = mysqli_query($conn, $countSql);
                                            $countRow = mysqli_fetch_assoc($countResult);
                                            $totalRecords = $countRow['total'];
                                                
                                            $sql = "SELECT * FROM users LIMIT $perPage OFFSET $offset";
                                            $users = mysqli_query($conn, $sql);
                                            // Tính toán số trang và liên kết phân trang ở đây
                                            $totalPages = ceil($totalRecords / $perPage);
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                echo "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                                            }
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>




                            </div>


                    </div>

                    <div class="col-md-1">

                    </div>
                </div>

            </div>
        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>