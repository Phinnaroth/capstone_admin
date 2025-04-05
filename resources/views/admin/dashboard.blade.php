@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $product }}</h3>

                    <p>Total Products</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">View <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>{{ $ingredient }}</h3>

                    <p>Total Ingredients</p>
                </div>
                <div class="icon">
                    <i class="fa fa-flask"></i>
                </div>
                <a href="{{ route('ingredients.index') }}" class="small-box-footer">View <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-24">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ $question }}</h3>

                    <p>Total Questions</p>
                </div>
                <div class="icon">
                    <i class="fa fa-briefcase"></i>
                </div>
                <a href="{{ route('questions.index') }}" class="small-box-footer">View <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
 
@endsection

