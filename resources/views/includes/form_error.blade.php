
    @if(count($errors) > 0)
    
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)
                
                    <li>{{ $error }}</li>
            
                @endforeach
            </ul>
            
        </div>
        
    @endif

    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <center><strong>{{ Session::get('alert-' . $msg) }}</strong></center>
            </div>       
        @endif
      @endforeach
    </div>