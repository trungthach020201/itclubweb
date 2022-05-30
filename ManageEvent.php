<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageEvent</title>

    <!-- CSS link of file manage user and index -->
    <link rel="stylesheet" href="./css/User/ManageUser.css">
    <link rel="stylesheet" href="./css/User/index.css">
</head>
<?php include_once('ConnectDB.php'); ?>

<body>

    <div id="manage-container">
        <p class="head-label">Manage Event</p>
        <div class="detail-mn">
            <!-- /model adduser -->
            <div class="modaluser js-modal-user">
                <form class="modal-container js-modal-container-user" method="POST" action="ManageEventPro.php?func=add">
                    <div class="modal-header">
                        <div class="modal-label">
                            <p> Add New Event </p>
                        </div>
                        <div class="model-close js-modal-close-user">
                            <i class=" icon-close">X</i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="modal-input">
                            <input type="text" class="input-info" name="title" id="title" placeholder="Event Name">
                            <p class="error-ev"></p>
                        </div>
                        <div class="modal-input">
                            <input type="date" class="input-info" name="date" id="date" placeholder="Date">
                            <p class="error-ev"></p>
                        </div>
                        <div class="modal-input">
                            <input type="time" class="input-info" name="time" id="time" placeholder="Time">
                            <p class="error-ev"></p>
                        </div>
                        <div class="modal-input">
                            <input type="text" class="input-info" id="location" name="location" placeholder="Location">
                            <p class="error-ev"></p>
                        </div>
                        <div class="modal-input">
                            <input type="text" class="input-info" name="description" id="description" placeholder="Description">
                            <p class="error-ev"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="button">
                            <button type="submit" class="modal-button" name="btn_add" id="btn_add">Add New</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- finish modal user -->


            <div class="detail-right">
                <div class="btn-add">
                    <button class="add-user js-add-user"> Add New Event</button>
                </div>
                <div class="table-1">
                    <table class="table">
                        <thead class="table-head">

                            <tr class="tr-head">
                                <th class="th-head">ID | Title</th>
                                <th class="th-head">Date</th>
                                <th class="th-head">Time</th>
                                <th class="th-head">Location</th>
                                <th class="th-head">Description</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM `event`");
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            ?>
                                <tr class="tr-body">

                                    <td class="td-body">
                                        <a href="?page=manageevent_update&&func=update&&id=<?php echo $row['id']; ?>" class="update-name js-update-name"> <?php echo $row['id']; ?> | <?php echo $row['title']; ?> </a>
                                    </td>
                                    <td class="td-body"><?php echo $row['date']; ?></td>
                                    <td class="td-body"><?php echo $row['time']; ?></td>
                                    <td class="td-body"><?php echo $row['location']; ?></td>
                                    <td class="td-body"><?php echo $row['description']; ?></td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
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

</body>

</html>