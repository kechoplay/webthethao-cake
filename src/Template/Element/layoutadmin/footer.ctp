</div>

<?= $this->Html->script('admin/bootstrap.min.js')?>
<?= $this->Html->script('admin/metisMenu.min.js')?>
<?= $this->Html->script('admin/sb-admin-2.js')?>
<?= $this->Html->script('admin/jquery.dataTables.min.js')?>
<?= $this->Html->script('admin/dataTables.bootstrap.min.js')?>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>