<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Role</th>
                <th>Status</th>
                <th><i>Change</i></th>
            </tr>
            <?php foreach($users as $user) : ?>
                <tr>
                    <td><?=$user['id'] ?></td>
                    <td><?=$user['firstname'] ?></td>
                    <td><?=$user['lastname'] ?></td>
                    <td><?=$user['phone'] ?></td>
                    <td><?=$user['email'] ?></td>
                    <td><?=$user['avatar'] ?></td>
                    <td><?=$user['role'] ?></td>
                    <td><?=$user['status'] ?></td>
                    <td>
                        <a href="">
                            <a href="/admin/users/edit/<?=$user['id']?>">Change</a>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>