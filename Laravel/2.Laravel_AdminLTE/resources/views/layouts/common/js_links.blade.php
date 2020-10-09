<!-- jQuery -->
<script src="/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLTE/js/adminlte.min.js"></script>

@yield('scripts')

<script>
    $(document).on('click', '#btn-add-new-phone', function () {
        const time = Date.now();
        $('ul#phones-list').append(`<li class="mb-3" id="number-${time}">
                        <input type="text" name="phones[new-${time}]">
                        <button type="button" class="btn btn-danger btn-delete" data-target="#number-${time}">-</button>
                    </li>`);
    })

    $(document).on('click', '.btn-delete', function () {
        $($(this).data('target')).remove();
    })
</script>
