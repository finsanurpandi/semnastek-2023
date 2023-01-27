<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin-template.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

{{-- menambahkan author --}}
<script>
    $(document).ready(function() {
        var count_author = 1;
        $('.btn-add-author').click(function() {
            var authorRow = $('.author-row').first().clone();
            authorRow.find('input').val('');
            $('#author-container').append(authorRow);
            count_author++
            if(count_author !== 1){
                $('.btn-remove-author').prop("disabled", false);
            }else{
                $('.btn-remove-author').attr("disabled", true);
            }
        });

        // $('#participant_category').change(function(e){
        //     if(e.target.value === 'mahasiswa'){
        //         $('#ktm_field').css('display', 'flex')
        //     }
        //     if(e.target.value === 'dosen'){
        //         $('#ktm_field').css('display', 'none')
        //     }
        // })

        $(document).on('click', '.btn-remove-author', function() {
            $(this).closest('.author-row').remove();
            count_author--;
            if(count_author !== 1){
                $('.btn-remove-author').prop("disabled", false);
            }else{
                $('.btn-remove-author').attr("disabled", true);
            }
        });
    });
</script>
