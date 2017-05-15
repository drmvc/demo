</div>
<!-- /.container -->

<!-- Vendor JS -->
<?php
foreach ($data['vendor_scripts'] as $item)
    echo '<script type="text/javascript" src="/vendor/' . $item . '"></script>' . "\n";
?>

<!-- Application JS -->
<?php
foreach ($data['scripts'] as $item)
    echo '<script type="text/javascript" src="/js/' . $item . '"></script>' . "\n";
?>

</body>
</html>
