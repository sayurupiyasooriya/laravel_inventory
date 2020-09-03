@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
@endpush
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Productions</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Insert Productions</h3>
            <span align-left>
                {{-- <a class="btn btn-action btn-primary float-right" title="Create" id="create">Create</a> --}}

            </span>
        </div>
        <!-- /.card-header -->
        <div class="container">

            <form method="POST" action="">
                {{-- select supplier --}}
                {{ csrf_field() }}
                <div class="form-inline">
                    <div class="form-group ml-2">
                        <label for="supplier_id">Select Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-control supplier_id">
                            <option selected="selected" value="">Select a Supplier</option>
                            @foreach ($buyers as $buyer)
                            <option value="{{$buyer->id}}">{{$buyer->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- select product --}}
                    <div class="form-group ml-2">
                        <label for="prd_cat">Select Production Category</label>
                        <select name="prd_cat" id="prd_cat" class="form-control">
                            @foreach ($productCat as $product)
                            <option value="{{$product->id}}">{{$product->type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ml-2">
                        <label for="product-name">Enter Product Name</label>
                        <input type="text" name="product-name" id="production-name">
                    </div>

                    <div class="form-group ml-2 ">
                        <input type="text" value="" id="add-field" name="product-name">
                    </div>
                </div>


                <div class="row">

                    <div class="col-sm-8 float-right">
                        <div class="append" id="append" name="append" style="height:224px; overflow:auto;">
                            <ul>

                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <a class="btn btn-action btn-warning float-right" title="Save" onclick="save_data()"  id="save">Save</a> --}}
                <input type="submit" name="create" id="create">
                <a class="btn btn-action btn-danger float-left" title="Delete" id="del">Delete</a>
                <input type="submit" name="saveData" id="saveData" value="Save" class="btn btn-warning float-right">

                {{-- <a class="btn btn-action btn-primary float-right" title="Create" id="create">Create</a> --}}
            </form>


        </div>


    </div>

    <!-- /.card -->
    @endsection

    @push('js')
    <script>
        function addItems() {
            var addField = $('#add-field');
            var addfleidText = addField.val();

            var appendableItem = ('<li><div class="item" txt="' + addfleidText + '" onclick="itemSelect(this)">' +
                addfleidText + '</div></li>');

            $('.append > ul').append(appendableItem);
            $('#add-field').val("");
        }

        function deleteField() {
            $('.append>ul>li>.selected').remove();
        }

        function dleteAll() {
            $('.append>ul>li').remove();
        }

        function itemSelect() {
            $(event.target).toggleClass('selected');
        }




        $(document).ready(function () {
            // $('#create').attr('onclick', 'addItems()');
            $("#supplier_id").change(function () {

            })

            $('#create').click(function (e) {
                e.preventDefault();
                addItems();
            });

            $('#del').attr('onclick', 'deleteField()');

            // save form data
            $('#saveData').click(function (e) {
                e.preventDefault();

                var supplierId = $("#supplier_id").val();
                var prdCatId = $("#prd_cat").val();
                var prdName = $("#production-name").val();
                // serial numbers
                var seldata = [];
                $('.append').find(".item").each(function () {
                    seldata.push($(this).attr("txt"));
                });



                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    }
                });

                $.ajax({
                    url: "{{url('productions/save')}}",
                    type: 'POST',
                    data:{
                serial: seldata,
                supplierId:supplierId,
                prdCatId:prdCatId,
                prdName:prdName
                    },
                    success:function(e){
                        toastr.success(e + " Records added successfully")
                    },
                    error:function(){
                        toastr.error("Please check and fill all the fields");
                    }
                   
                });

        });
        });

    </script>
    @endpush
