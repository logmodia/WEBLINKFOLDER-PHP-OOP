<div class="container-fluid">
    <H3 class="text-center">My WebLinkFolder space</H3>

    <H5>USERS LIST</H5>
    
    <?php foreach ($usersList as $key => $value): ?>
        <div>
            <?php echo $value->userName; ?>
        </div>
    <?php endforeach; ?>
    
</div>