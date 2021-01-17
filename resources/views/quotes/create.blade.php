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
                                 
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}"> {{$subcategory->name}} </option>
                                    @endforeach
                                    
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
