@extends('layouts.welcome')
@section('content')
    <div class="return">
        <h1 style="font-family:'Special Elite', cursive; text-align: center;">Return Policy</h1>
        <div class="policy">
            <p class="user">All defined terms used below shall have the meanings set forth in Our Terms and Conditions.
                See <a href="{{route('guide.terms')}}">Terms and Conditions</a></p>
<br>
            <h3>- Order Cancellations</h3>
            <p class="user">Orders that you submit online are processed immediately and may not be cancelled,
                and you may need to wait until you receive the merchandise in order to return it.</p><br>

            <h3>- Returns</h3>
            <p class="user">Once an item of merchandise is delivered to you, you can return that item within
                30 days of delivery. To be eligible for a return, your merchandise must be unused and in the
                same condition that you received it and must be in the original packaging.  Our return policy
                does not apply to the following goods: [discounted or sale items, used goods, scratched items,
                etc][include any that are applicable].  These items are not eligible for return, refund or
                exchange.</p>
            <br>

            <h3>- Shipping</h3>
            <p class="user">To initiate a return, please email us at alishajonchhen1@gmail.com.  We require
                a receipt or proof of purchase to accompany your return.<br>
                All returned merchandise should be sent to us at Jawalakhel, Lalitpur.<br>
                You are responsible for paying for all shipping costs for your returned item. Shipping costs are
                non-refundable. If you receive a refund, the cost of any return shipping will be deducted from your
                refund. <br>
                You should consider using a trackable shipping service or purchasing shipping insurance for
                items of value.</p><br>

            <h3>- Refunds and Exchanges</h3>
            <p class="user">After We have received your valid return, We will send you an email to notify
                you that We have received your returned item and notify you of the acceptance or rejection
                of your return.<br>
                If your return is accepted by Us, We will provide one of the following within a reasonable
                time: an exchange of merchandise for the item returned, a non-transferable merchandise credit,
                a credit to the payment card or original method of payment used to pay for the item, a check,
                or another remedy that we determine in good faith is appropriate in the circumstances.</p><br>
        </div>
    </div>


@endsection
