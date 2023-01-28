<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin-template.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(window).on("load", function () {
        function HideLoader() {
            setTimeout(() => {
                $("#Loader").fadeOut(100);
            }, 500);
        }
        HideLoader();
    });

    $(document).ready(function(){
        $('#confirm_password').on('blur', function(e){
            if(e.target.value !== $('#password').val()){
                alert("Konfirmasi Password tidak sesuai");
                $('#confirm_password').val("");
            }
        })
    })
</script>
