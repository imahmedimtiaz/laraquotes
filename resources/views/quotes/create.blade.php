@extends('layouts.master')

@section('content')
    
    <div class="ibox ">
        <div class="ibox-title">
            <h5> Quote<small> Create</small></h5>
        </div>
        <div class="ibox-content">
        <form id="form" method="POST" action="{{route('quotes.store')}}"
        enctype="multipart/form-data">
                @csrf
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label>Quotation</label> 
                                <textarea type="text" name="quotation" placeholder="Quotation" class="form-control">{{ old('description') }}</textarea>
                                <div class="errors text-danger"> {{ $errors->first('quotation') }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label> 
                                <select name="category_id" id="category_id" class="form-control">
                                 
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                    
                                </select>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subcategory</label> 
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    
                                </select>
                             </div>
                        </div>
                        
                    </div>
                   
                <div class="hr-line-dashed"></div>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                    <a href="{{route('quotes.index')}}" class="btn btn-white btn-sm">Cancel</a>
                        <button class="btn btn-primary btn-sm" type="submit">Create</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
@push('footer_scripts')
<script>
    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            $('#subcategory_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#subcategory_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
              
            }
        });  
    }
    $(document).ready(function(){
        get_subcategories_by_category();
    });
      $('#category_id').on('change', function() {
        get_subcategories_by_category();
    });

</script>
@endpush
