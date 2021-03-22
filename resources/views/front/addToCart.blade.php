@extends('layouts.welcome')
@section('body')
<div class="container product-list">

    <div class="row ">
        <div class="col-lg-12 pb-2">
            <h2> Your Items </h2>
        </div>
        <div class="col-lg-12 pl-3 pt-3">
            <table class="table table-hover border bg-white">
                <thead>
                    <tr>
                        <th>
                            <h4> <b> Product Details </b> </h4>
                        </th>
                        <th>
                            <h4> <b> Price </h4> <b>
                        </th>
                        <th style="width:10%;">
                            <h4> <b> Quantity <b> </h4>
                        </th>
                        <th>
                            <h4> <b> Subtotal <b> </h4>
                        </th>
                        <th>
                            <h4> <b> Action <b> </h4>
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
                                        class="img-responsive" />
                                </div>
                                <div class="col-lg-10">
                                    <h5 class="nomargin"> <b> {{ $item->product->name }} </b> </h5>
                                    <p> {{ $item->product->product_description }} </p>
                                </div>
                            </div>
                        </td>
                        <td> <strong> {{ $item->price  }} </strong> </td>
                        <td data-th="Quantity">
                            <b> <input type="number" class="form-control text-center item-qty"
                                    value="{{ $item->quantity  }}" min="1" id="item{{ $item->product->id }}"
                                    data-price="{{ $item->product->product_price }}" data-id="{{ $item->product->id }}">
                            </b>
                        </td>
                        <td>

                            <strong id="total{{ $item->product->id }}" class="total">
                                {{ $item->total * $item->quantity }}</strong>
                        </td>
                        <td class="actions" data-th="" style="width:10%;">
                            <button class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-shopping-cart">
                                </span>
                            </button>
                            <button class="btn btn-danger btn-sm"> <i class="icon-trash"> </i> </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            No items added . SHOW NOW.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td> <a href="{{ route('front.home') }}" class="btn btn-success "> <i class="fa fa-angle-left">
                                </i> Continue Shopping
                            </a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center" style="width:10%;">
                            <strong id="totalPrice"> Total Price :
                                {{ $total }} </strong>
                        </td>
                        <td> <a href="#" class="btn btn-success btn-block"> Checkout <i class="fa fa-angle-right"> </i>
                            </a>
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
            console.log(productId);
            console.log(id);
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
            $("#totalPrice").html(totalPrice.toFixed(2));
        });
    });
    
</script>
@endsection