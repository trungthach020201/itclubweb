<!-- body -->
<div id="manage-container">
    <p class="head-label">Manage User</p>
    <div class="detail-mn">

        <script type="text/javascript">
            function confirm_delete() {
                return confirm('Are you sure?');
            }
        </script>
        <!-- modal -->
        <div class="modal js-modal open">
            <form id="form-update" class="modal-container js-modal-container" action="manageuserpro.php?function=update" method="POST">
                <?php
                include_once("connectDB.php");
                if (isset($_GET['stuid'])) {
                    $id = $_GET['stuid'];
                    $result = mysqli_query($conn, "SELECT *FROM users where StudentID='$id'");
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                }
                ?>
                <div class="modal-header">
                    <div class="modal-label">
                        <p> User Info </p>
                    </div>
                    <div class="model-close js-modal-close">
                        <i class=" icon-close">x</i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="modal-input">
                        <div class="form-group">
                            <input value="<?php echo $row['id']; ?>" type="hidden" name="id" id="id" class="input-info">
                            <input value="<?php echo $row['username']; ?>" type="text" name="username" id="username" class="input-info" placeholder="UserName">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $row['StudentID']; ?>" type="text" name="stid" id="stid" class="input-info" placeholder="StudentID.....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $row['email']; ?>" type="text" id="email" name="email" class="input-info" placeholder="User email,....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $row['card_uid']; ?>" type="number" id="card_id" name="cart_id" class="input-info" placeholder="CardID,....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                    </div>
                    <div class="modal-sublabel">
                        <h4>Additional Info</h4>
                    </div>
                    <label class="department-label">User Department:</label>
                    <div class="modal-input">
                        <!-- Display current department -->
                        <select class="input-info" placeholder="Department" name="department" id="department">
                            <?php $department = array(
                                "<option value='Font-end'>Font-end</option>",
                                "<option value='Back-end'>Back-end</option>",
                                "<option value='Design'>Design</option>",
                                "<option value='Media'>Media</option>"
                            ) ?>
                            <?php
                            $depart = $row['Department'];
                            switch ($depart) {
                                case "Font-end":
                                    echo $department[0];
                                    echo $department[1];
                                    echo $department[2];
                                    echo $department[3];
                                    break;
                                case "Back-end":
                                    echo $department[1];
                                    echo $department[0];
                                    echo $department[2];
                                    echo $department[3];
                                    break;
                                case "Design":
                                    echo $department[2];
                                    echo $department[1];
                                    echo $department[0];
                                    echo $department[3];
                                    break;
                                case "Media":
                                    echo $department[3];
                                    echo $department[0];
                                    echo $department[2];
                                    echo $department[1];
                                    break;
                                default:
                                    echo $department[3];
                                    echo $department[0];
                                    echo $department[2];
                                    echo $department[1];
                                    break;
                            }
                            ?>
                        </select>
                    </div>
                    <label class="department-label">Gender:</label>
                    <div class="gender">
                        <?php if ($row['gender'] == 'male') {
                            echo '<input type="radio" name="gender" value="male" checked> <span>Male</span>';
                            echo ' <input type="radio" name="gender" value="female"> <span>Female</span>';
                        } else {
                            echo '<input type="radio" name="gender" value="male"> <span>Male</span>';
                            echo ' <input type="radio" name="gender" value="female" checked> <span>Female</span>';
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="button">
                        <button type="submit" id="btn-update" name="btn-update" class="modal-button">Update User</button>
                        <a style="text-align: center; background-color: rgb(238, 245, 245); font-size: 14px; text-decoration: none; color:black" href="?page=manageuserpro&&stid=<?php echo $row['StudentID']; ?>" onclick="return confirm_delete()" id="btn-delete" name="btn-delete" class="modal-button">Remove User</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- finish modal -->
        <!-- /model adduser -->
        <div class="modaluser js-modal-user">
            <form id="form-add" name="form-add" class="modal-container js-modal-container-user" action="manageuserpro.php?function=add" method="POST">
                <div class="modal-header">
                    <div class="modal-label">
                        <p> User Info </p>
                    </div>
                    <div class="model-close js-modal-close-user">
                        <i class=" icon-close">x</i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="modal-input">
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="input-info" placeholder="UserName">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="stid" id="stid" class="input-info" placeholder="StudentID.....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" name="email" class="input-info" placeholder="User email,....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                        <div class="form-group">
                            <input type="number" id="card_id" name="cart_id" class="input-info" placeholder="CardID,....">
                            <p class="error" style="margin-bottom: 0;"></p>
                        </div>
                    </div>
                    <div class="modal-sublabel">
                        <h4>Additional Info</h4>
                    </div>
                    <label class="department-label">User Department:</label>
                    <div class="modal-input">
                        <select class="input-info" name="department" id="department" placeholder="Department">
                            <option value="1">All Department</option>
                            <option value="Font-end">Font-end</option>
                            <option value="Back-end">Back-end</option>
                            <option value="Design">Design</option>
                            <option value="Media">Media</option>
                        </select>
                    </div>
                    <label class="department-label">Gender:</label>
                    <div class="gender">
                        <input type="radio" name="gender" value="male" checked> <span>Male</span>
                        <input type="radio" name="gender" value="female"> <span>Female</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="button">
                        <button type="submit" name="btn_add" id="btn_add" class="modal-button">Add User</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- finish modal user -->


        <div class="detail-right">
            <div class="btn-add">
                <button class="add-user js-add-user"> Add new</button>
            </div>
            <div class="table-1">
                <table class="table">
                    <thead class="table-head">
                        <tr>
                            <th>ID | Name</th>
                            <th>Department</th>
                            <th>Gender</th>
                            <th>Card UID</th>
                            <th>DateAdd</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        <?php
                        include_once("connectDB.php");
                        $result = mysqli_query($conn, "SELECT * FROM users");
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td>
                                    <a href="?page=manageuser_update&&stuid=<?php echo $row['StudentID']; ?>" class="update-name js-update-name"> <?php echo $row['StudentID']; ?> | <?php echo $row['username']; ?> </a>
                                </td>
                                <td> <?php echo $row['Department']; ?> </td>
                                <td> <?php echo $row['gender']; ?> </td>
                                <td> <?php echo $row['card_uid']; ?> </td>
                                <td> <?php echo $row['user_date']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script script>
    const editInfors = document.querySelectorAll('.js-update-name') //sellect the class use to use js
    const modalclose = document.querySelector('.js-modal-close')
    const modal = document.querySelector('.js-modal')
    const modalcontainer = document.querySelector('.js-modal-container')

    function showModal() {
        modal.classList.add('open')
    }

    for (const editInfor of editInfors) {
        editInfor.addEventListener('click', showModal)
    }

    function hideModal() {
        modal.classList.remove('open')
    }
    modalclose.addEventListener('click', hideModal)

    modal.addEventListener('click', hideModal)

    modalcontainer.addEventListener('click', function(event) {
        event.stopPropagation() //stop nổi bọt
    })


    const addUsers = document.querySelectorAll('.js-add-user') //sellect the class use to use js
    const modalcloseUser = document.querySelector('.js-modal-close-user')
    const modalUser = document.querySelector('.js-modal-user')
    const modalcontainerUser = document.querySelector('.js-modal-container-user')

    function showModalAdd() {
        modalUser.classList.add('open')
    }

    for (const addUser of addUsers) {
        addUser.addEventListener('click', showModalAdd)
    }

    function hideModalAdd() {
        modalUser.classList.remove('open')
    }
    modalcloseUser.addEventListener('click', hideModalAdd)

    modalUser.addEventListener('click', hideModalAdd)

    modalcontainerUser.addEventListener('click', function(event) {
        event.stopPropagation() //stop nổi bọt
    })
</script>

<script src="./js/validator.js"></script>
<script>
    Validator({
        form: '#form-add',
        formGroupSelector: '.form-group',
        errorSelector: '.error',
        rules: [
            Validator.isRequired('#username', 'this feild can not empty'),
            Validator.isRequired('#stid', 'this feild can not empty'),
            Validator.isRequired('#email', 'this feild can not empty'),
            Validator.isRequired('#card_id', 'this feild can not empty'),
            Validator.isEmail('#email', 'Invalid email'),
        ],
        // onSubmit: function(data) {
        //     console.log(data)
        // }
    });
    Validator({
        form: '#form-update',
        formGroupSelector: '.form-group',
        errorSelector: '.error',
        rules: [
            Validator.isRequired('#username', 'this feild can not empty'),
            Validator.isRequired('#stid', 'this feild can not empty'),
            Validator.isRequired('#email', 'this feild can not empty'),
            Validator.isRequired('#card_id', 'this feild can not empty'),
            Validator.isEmail('#email', 'Invalid email'),
        ],
        // onSubmit: function(data) {
        //     console.log(data)
        // }
    });
</script>