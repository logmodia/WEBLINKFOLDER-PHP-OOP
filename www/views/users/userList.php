<H3>USERS LIST</H3>
<OL>
    <?php foreach ($usersList as $key => $value): ?>
        <li><?php echo $value->userName; ?>
            <ul>
                <li>
                    <?php echo 'ID : '.$value->idUser; ?>
                </li>
                <li>
                    <?php echo 'Email : '.$value->email; ?>
                </li>
                <li>
                    <?php echo 'Role : '.$value->userRole; ?>
                </li>
            </ul>
        </li>
    <?php endforeach; ?>
</OL>