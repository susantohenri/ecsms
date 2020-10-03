<script type="text/javascript">
    <?php if(isset ($download_page)): ?>
        window.open('<?= $download_page ?>')
    <?php endif ?>
    window.location = '<?= $redirect_page ?>'
</script>