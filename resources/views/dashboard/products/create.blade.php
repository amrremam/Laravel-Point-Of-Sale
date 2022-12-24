@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('Products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('Dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> @lang('Products')</a></li>
                <li class="active">@lang('Add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('Add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>@lang('Categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('All Categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label>@lang('Image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/product_images/default.png') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('Purchase Price')</label>
                            <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{ old('Purchase Price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('Sale Price')</label>
                            <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ old('Sale Price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('Stock')</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('Stock') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
