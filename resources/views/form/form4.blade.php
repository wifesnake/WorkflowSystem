<h1>form4</h1>

<div class="container mt-4">
 
    <h2 class="text-center">File Upload in Laravel 8 - Tutsmake.com</h2>
   
        <form method="POST" enctype="multipart/form-data" action="{{ route('upload.uploadFile') }}" >
                   
            <div class="row">
   
                <div class="col-md-12">
                    <div class="form-group">
                        @foreach ($flowdatas as $item)
                            <input name="order_file" id="order_file" class="form-control" type="text" value="{{ $item->ord_vehicle }}">
                        @endforeach
                        <input type="file" name="file" placeholder="Choose file" id="file">
                          @error('file')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
  </div>

  @foreach ($dataimage as $item)
    <img src="{{ $item->base64 }}" alt="{{ $item->image }}">
  @endforeach
   
  </div> 