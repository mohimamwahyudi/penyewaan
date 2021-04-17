 <footer>
        <div class="jumbotron text-center bg-dark pt-3 pb-1 mt-5 mb-0 ">
            <p>Penyewaan Mobil Torjun &copy; <?= date('Y') ?></p>
        </div>
    </footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>

        $('#sewa').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget) // Button that triggered the modal

            var recipient = button.data('id')

            var modal = $(this)

            modal.find('input[name=id]').val(recipient)



        })

    </script>

</body>

</html>