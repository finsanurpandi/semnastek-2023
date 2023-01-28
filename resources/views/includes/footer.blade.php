<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin-template.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    title : "Konfirmasi password tidak sesuai",
                    icon : "error"
                })
                $('#confirm_password').val("");
                $('#confirm_password').focus();
            }
        })
    })
</script>
