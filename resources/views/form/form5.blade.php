<h1>form5</h1>

<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-header">
                    <h5>Laravel Signature Pad Tutorial Example - ItSolutionStuff.com </h5>
                </div>
                <div class="card-body">
                     @if ($message = Session::get('success'))
                         <div class="alert alert-success  alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert">x</button>  
                             <strong>{{ $message }}</strong>
                         </div>
                     @endif
                     <form method="POST" action="{{ route('upload.signature') }}">
                         @csrf
                         <div class="col-md-12">
                             <label class="" for="">Signature:</label>
                             @foreach ($flowdatas as $item)
                                <input name="order_signature" id="order_signature" class="form-control" type="text" value="{{ $item->ord_vehicle }}">
                            @endforeach
                             <br/>
                             <div id="sig" ></div>
                             <br/>
                             <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                             <textarea id="signature64" name="signed" style="display: none"></textarea>
                         </div>
                         <br/>
                         <button class="btn btn-success">Save</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
 </div>

 <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>