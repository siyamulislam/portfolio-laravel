{{--update status--}}

{{--1 route--}}
<a href="#statusModal" data-toggle="modal" data-route="{{route('image.status',['id'=>$image->id])}}"
   class="btn btn-sm {{ $image->status == 1 ? 'btn-secondary' : 'btn-warning' }}"
   title="Change Image Status ">
    <i class="{{ $image->status == 1 ? 'zmdi zmdi-long-arrow-up' : 'zmdi zmdi-long-arrow-down' }}"></i></a>


{{--modal--}}
<!-- statusModal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you confirm to update this status?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel</button>
                <a type="button" href="" class="btn btn-primary btn-round waves-effect" id="btnMdUpdate">Update</a>
            </div>
        </div>
    </div>
</div>
{{--script--}}
{{--updateStatusModal 2--}}

<script>
    $('#statusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        // let id = button.data('id') // Extract info from data-* attributes
        // let route=`\{\{route('image.status',['id'=>`+id+`])\}\}`;
        let updateURL = button.data('route')
        // alert(updateURL)
        document.getElementById("btnMdUpdate").href=updateURL;
        $("#statusModal").on("click", "#btnMdUpdate", function () {
            $('#statusModal').modal('hide');
        });
    })
</script>
{{--update ajax--}}

{{--1 route--}}
<a href="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
   data-toggle="modal"
   class="btn btn-danger btn-sm">
    <i class="zmdi zmdi-delete"></i></a>

{{--modal--}}
<!-- statusModal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you confirm to update this status?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button"  class="btn btn-primary btn-round waves-effect" id="btnMdUpdate">Update</button>
            </div>
        </div>
    </div>
</div>

{{--script--}}
{{--updateStatus--}}

<script>
    $('#statusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        let href = button.data('route') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        // var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        // modal.find('.modal-body input').val(recipient)

        $("#statusModal").on("click", "#btnMdUpdate", function () {
            $.ajax({
                url: href,
                beforeSend: function () {
                    console.log('starting');
                },
                complete: function () {
                    console.log('done');
                    $('#statusModal').modal('hide');
                    location.reload(true);
                    // $("#tableDIV").load(location.href+"# tableDIV*","");
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    })
</script>
