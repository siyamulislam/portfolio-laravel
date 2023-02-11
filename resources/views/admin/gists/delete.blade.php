{{--delete form--}}

{{--1 route--}}
<a href="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
   data-toggle="modal"
   class="btn btn-danger btn-sm">
    <i class="zmdi zmdi-delete"></i></a>

{{--modal--}}
<!-- deleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you confirm to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel
                </button>
                <form id="deleteForm" action=""
                      method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary btn-round waves-effect" id="btnMdDelete">Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
{{--script--}}
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        let href = button.data('route') // Extract info from data-* attributes
        document.getElementById("deleteForm").action = href;

        $("#deleteModal").on("click", "#btnMdDelete", function () {
            $('#deleteModal').modal('hide');

        });
    })
</script>
{{--delete ajax--}}

{{-- route--}}
<a href="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
   data-toggle="modal"
   class="btn btn-danger btn-sm">
    <i class="zmdi zmdi-delete"></i></a>

{{--modal--}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you confirm to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel
                </button>
                <button type="button" class="btn btn-primary btn-round waves-effect" id="btnMdDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

{{--script--}}
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        let href = button.data('route') // Extract info from data-* attributes
        $("#deleteModal").on("click", "#btnMdDelete", function () {
            $.ajax({
                url: href,
                type: 'POST',
                data: {_method: "DELETE",},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function () {
                    console.log('starting');
                    // $('.page-loader-wrapper').show();
                },
                success: function () {
                    console.log('done');

                },
                complete: function () {
                    $('#deleteModal').modal('hide');
                    // $('.page-loader-wrapper').hide();
                    location.reload(true);
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page" + href + "cannot open. Error:" + error);
                }
            });
        });
    })
</script>


{{--direct by form--}}
<form action="{{route('gallery.destroy',$image->id)}}"
      method="post" style="display: inline-block"
      onsubmit="return confirm('Are you sure to delete this ?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="zmdi zmdi-delete"></i></button>
</form>
