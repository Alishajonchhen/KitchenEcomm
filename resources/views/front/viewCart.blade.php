@extends('layouts.welcome')
@section('body')
    <style>
        .head{
            font-family: Baskerville Old Face;
            font-size: 25px;"
        }

        #totalPrice {
            font-family: Baskerville Old Face;
            font-size: 20px;
        }
    </style>
<div class="container product-list">

    <div class="row ">
        <div class="col-lg-12 pb-2">
            <h2 style="font-family: Baskerville Old Face; font-size: 30px;">
                My Products </h2>
        </div>
        <div class="col-lg-12 pl-3 pt-3">
            <table class="table table-hover border bg-white" >
                <thead>
                    <tr>
                        <th>
                            <h4 class="head"> <b> Product Details </b> </h4>
                        </th>

                        <th>
                            <h4 class="head"> <b> Price </b></h4>
                        </th>
                        <th style="width:10%;">
                            <h4 class="head"> <b> Quantity </b> </h4>
                        </th>
                        <th>
                            <h4 class="head"> <b> Subtotal </b> </h4>
                        </th>
                        <th>
                            <h4 class="head"> <b> Action </b> </h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @forelse ($items as $key=>$item)
                    @php
                    $total = $total + $item->total;
                    @endphp
                    <tr>

                        <td>
                            <div class="row">
                                <div class="col-lg-2 Product-img">
                                    <img src="{{ $item->product->image_path .$item->product->product_image }}" alt="..."
                                        class="img-responsive" style="height: 80px; width: 120px;"/>
                                </div>
                                <div class="col-lg-10">
                                    <a href="{{ route('frontend-product-detail', $item->product->id) }}">
                                        <h5 class="nomargin"> <b> {{ $item->product->product_name }} </b> </h5>
                                    </a>
                                    <p> {{ $item->product->product_description }} </p>
                                </div>
                            </div>
                        </td>

                        <td> <strong style="margin-left: 60px;"> {{ $item->price  }} </strong> </td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center item-qty"
                                value="{{ $item->quantity  }}" min="1" id="item{{  $item->product->id }}"
                                data-price="{{ $item->product->product_price }}" data-id="{{  $item->product->id }}"
                                disabled style="margin-left: 30px;">
                            <button class="btn btn-success edit" id="edit{{  $item->product->id }}"
                                data-id="{{  $item->product->id }}" type="submit" style="background-color: black; margin-left: 30px;">Edit</button>
                            <button class="btn btn-success save" id="save{{ $item->product->id }}"
                                data-id="{{ $item->product->id }}"
                                data-href="{{ route('add-to-cart', $item->product->id) }}"
                                    style="background-color: rgba(65,195,152,0.78); margin-left: 90px; margin-top: -34px;">Save</button>
                            <button class="btn btn-success cancel" id="cancel{{  $item->product->id }}"
                                style="display: none;" data-id="{{  $item->product->id }}">Cancel</button>
                        </td>
                        <td>

                            <strong id="total{{ $item->product->id }}" class="total" >
                                {{ $item->price * $item->quantity }}</strong>
                        </td>
                        <td class="actions" data-th="" style="width:12%;">

                            <button class="btn btn-danger btn-sm remove" id="remove{{ $item->id }}"
                                data-href="{{ route('remove-item', $item->id) }}"
                                    style="background-color: rgba(214,99,72,0.78); margin-left: 70px;"> <i class="icon-trash"> </i> </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            No items added . SHOP NOW.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td> <a href="{{ route('front.home') }}" class="btn btn-success "
                                style="background-color: black; margin-top: 42px; height: 40px;
                                font-size: 15px;">
                                <i class="icon-angle-left">
                                </i> Continue Shopping
                            </a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center" style="width:10%;">
                            <strong id="totalPrice"> Total Price : {{ $total }} </strong>
                        </td>
                        <td>
                            @if (count($items) > 0)
                            <a href="{{ route('checkout-order') }}" class="btn btn-success btn-block"
                               style="background-color: rgba(65,195,152,0.78);"> Checkout <i
                                    class="icon-angle-right"> </i>
                            </a>
                            @endif

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
<style>
    .product-list {
        margin-top: 60px;
    }

    .nomargin{
        font-size: 17px;
    }

    .total{
        margin-left: 70px;
    }

</style>
@section('scripts')
<script>
    $(document).ready(function(){

      //on change of item Qty
        $(".item-qty").on('input', function(){
            let qty = $(this).val();
            let id = $(this).attr('id');
            let productId = $(this).attr('data-id');
            let price = $(this).attr('data-price');
            let subTotal = qty*price;
            //Once the qty changes re render the sub total of that item;
            $("#total"+productId).html(subTotal.toFixed(2));

            //Get all the totals of the items
            let allTotals = $('.total').map((_,el) => el.innerHTML).get();
            let totalPrice = 0;
            //Calculate the Grand total
            allTotals.forEach(total => {
                totalPrice = parseFloat(totalPrice) + parseFloat(total);
            });
            $("#totalPrice").html('Total Price : '+totalPrice.toFixed(2));
        });

        //when edit button is pressed
        $(".edit").on('click', function(){
            let id = $(this).attr('data-id');
            $("#item"+id).attr('disabled', false);
            $("#edit"+id).css('display', 'none');
            $("#save"+id).css('display', 'inline');
            $("#cancel"+id).css('display', 'inline');
        });

    //when cancel button is clicked
        $(".cancel").on('click', function(){
            let id = $(this).attr('data-id');
            $("#item"+id).attr('disabled', true);
            $("#edit"+id).css('display', 'inline');
            $("#save"+id).css('display', 'none');
            $("#cancel"+id).css('display', 'none');
        });

       //when save button is clicked
       $(".save").on("click", function(){
           let url = $(this).attr('data-href');
           let id = $(this).attr('data-id');
           let qty = $("#item"+id).val();
           //making an ajax request to update the product quantity
         $.get(url,{'qty': qty},function(data,status){
                $("#item"+id).attr('disabled', true);
                $("#edit"+id).css('display', 'inline');
                $("#save"+id).css('display', 'none');
                $("#cancel"+id).css('display', 'none');
            }).done(function(data){
                alert('Product quantity updated  successfully.');
            }).fail(function(){
             alert('Error occurred during updating the product quantity.');
            });
       })

       //when the remove icon is clicked.. removes the item from cart ;)
       $(".remove").on("click", function(){
           let res = confirm("Do you really want to remove this item?");
               if(res == true){
                    let id = $(this).attr('data-id');
                    let removeUrl = $(this).attr('data-href');
                    let that = this;
                    $.ajax({
                        url: removeUrl,
                        method:'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                        //removing the clicked product from the frontend table
                        $(that).closest('tr').remove();
                        $("#cart-item-count").html(parseInt(data.data));
                        },
                        error:function(err){
                            console.log(err);
                        }
                    });
                }

       });


    });

</script>
@endsection
