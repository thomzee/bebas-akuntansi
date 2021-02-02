<script>
    $(function () {
        $('.datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route($route . ".datatables") !!}',
            columns: [
                {data: 'name'},
                {data: 'email'},
                {data: 'status'},
                {data: 'position'}
            ]
        });
    });
</script>
