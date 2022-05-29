<body>

    <div id="user-container">
        <p class="head-label">List of Members</p>
        <table class="table">
            <thead class="table-head">
                <tr>
                    <th>ID | Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>UserDate</th>
                    <th>Device</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <?php
                include_once("connectDB.php");
                $No = 1;
                if (isset($_SESSION["us"])) {
                    $username = $_SESSION["us"];
                }
                $result = mysqli_query($conn, "SELECT * FROM users");
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td>
                            <a href="#" class="update-name"> <?php echo $row['StudentID']; ?> | <?php echo $row['username']; ?> </a>
                        </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['Department']; ?></td>
                        <td><?php echo $row['user_date']; ?></td>
                        <td><?php echo $row['device_dep']; ?></td>
                    </tr>
                <?php $No++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>