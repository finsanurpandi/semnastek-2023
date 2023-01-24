<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin-template.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

{{-- menambahkan author --}}
<script>
    $(document).ready(function() {
        $('.btn-add-author').click(function() {
            var authorRow = $('.author-row').first().clone();
            authorRow.find('input').val('');
            $('#author-container').append(authorRow);
        });

        $(document).on('click', '.btn-remove-author', function() {
            $(this).closest('.author-row').remove();
        });
    });
</script>
