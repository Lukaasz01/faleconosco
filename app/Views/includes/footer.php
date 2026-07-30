<footer class="bg-medium-green mt-5 py-4">
    <div class="container">
        <div class="row text-center align-items-center">
            <div class="col-12 d-flex justify-content-around">
                <div class="d-none d-md-flex">
                    <img src="<?php echo base_url('img/logo/branco/' . strtolower($uf) . '.png'); ?>"
                    <?=strtoupper($get_uf)?>" class="img-fluid mh-40">
                </div>

                <div class="d-flex">
                    <img src="<?php echo base_url('img/logo/branco/cfm_crms.png'); ?>"
                    class="img-fluid mh-40">
                </div>
        </div>
        <div class="text-center text-white mt-3">
            © 2025 Regional CFM/CRMs - Todos os direitos reservados
        </div>
    </div>
</footer>

</body>

<script>
    document.querySelectorAll('a').forEach(link => {
        link.setAttribute('target', '_blank');
    });
</script>

<script>
    (function () {
        // Example starter JavaScript for disabling form submissions if there are invalid fields 'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

</script>

<script>
    const CurrentUrl = '<?php echo base_url();?>';
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>