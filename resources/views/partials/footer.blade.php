 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout -->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"></span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <form action="/logout" method="post">
                     @csrf
                     <button type="submit" class="btn btn-primary-item">
                         Logout</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 {{-- @include('sweetalert::alert') --}}
 <!-- Bootstrap core JavaScript-->
 {{-- <script src="/assets/vendor/jquery/jquery.min.js"></script> --}}
 <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="/assets/js/sb-admin-2.min.js"></script>

 <!-- Datepicker -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

 <script>
     function previewImage() {
         const image = document.querySelector('#image');
         const imgPreview = document.querySelector('.img-preview');

         imgPreview.style.diplay = 'block';
         const oFReader = new FileReader();
         oFReader.readAsDataURL(image.files[0]);

         oFReader.onload = function(oFREvent) {
             imgPreview.src = oFREvent.target.result;
         }
     }
 </script>
 <!-- Plugin file -->
 <script src="/js/addons/datatables.min.js"></script>

 <script language="JavaScript" type="text/javascript">
     $(function() {
         $('.datepicker').datepicker({
             language: "es",
             autoclose: true,
             format: "yyyy-mm-dd"
         });
     });
 </script>
 <script>
     const BASE_URL = $('base[ href ]').attr('href');

     const $_SELECT_PICKER = $('.my-image-selectpicker');

     $_SELECT_PICKER.find('option').each((idx, elem) => {
         const $OPTION = $(elem);
         const IMAGE_URL = $OPTION.attr('data-thumbnail');

         if (IMAGE_URL) {
             $OPTION.attr('data-content', "<img src='%i'/> %s".replace(/%i/, BASE_URL + IMAGE_URL).replace(/%s/,
                 $OPTION.text()))
         }

         console.warn('option:', idx, $OPTION)
     });

     $_SELECT_PICKER.selectpicker();


     // $('.selectpicker').selectpicker();

     /* $(document).ready(function() {
       // Initiate with custom caret icon
       $('select.selectpicker').selectpicker({
         caretIcon: 'glyphicon glyphicon-menu-down'
       });
     }); */
 </script>
