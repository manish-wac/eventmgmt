
<div class="results" id="js-common-alert">
@if(Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('success')}}
  </div>

@endif  

@if(Session::get('error'))
<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('error')}}
</div>

@endif

</div>
