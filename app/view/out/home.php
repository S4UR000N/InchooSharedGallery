<!-- MODALS.START -->

<!-- Preview File Modal -->
<div class="modal fade" id="preview_file">
 <div class="modal-dialog modal-lg">
  <div class="modal-content d-flex">

   <!-- Modal Header -->
   <div class="modal-header">
    <span class="col-sm-5"></span>
    <h1 class="col-sm-6">Preview</h1>
    <button class="close" data-dismiss="modal">&times;</button>
   </div>

   <!-- Modal body -->
   <div id="preview_file_body" class="modal-body row justify-content-center"></div>

   <!-- Modal footer -->

  </div>
 </div>
</div>

<!-- Preview Info Modal -->
<div class="modal fade" id="preview_info">
 <div class="modal-dialog modal-lg">
  <div class="modal-content d-flex">

   <!-- Modal Header -->
   <div class="modal-header">
    <span class="col-sm-5"></span>
    <h1 class="col-sm-6">Info</h1>
    <button class="close" data-dismiss="modal">&times;</button>
   </div>

   <!-- Modal body -->
   <div id="preview_info_body" class="modal-body row justify-content-center"></div>

   <!-- Modal footer -->

  </div>
 </div>
</div>


<!-- MODALS.END -->


<!-- Hidden Table -->
<table class="table table-dark table-bordered table-striped" style="display: none;">
 <thead>
  <tr>
   <th>Name</th>
   <th class="text-warning">Preview</th>
   <th class="text-primary">Download</th>
   <th class="text-info">Info</th>
  </tr>
 </thead>
 <tbody>
 </tbody>
</table>

<!-- Trigger Ajax Button -->
<button id="btn" class="btn btn-dark btn-lg" style="color: white; position: relative; left: 49%;" onclick="AjaxGetAllFiles();">Click Me (:</button>