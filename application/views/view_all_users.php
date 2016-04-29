<table>
        <thead>
                <tr>
                        <th>Username</th>
                        <th>Email</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($users as $user) : ?>
                <tr>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->email; ?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
</table>