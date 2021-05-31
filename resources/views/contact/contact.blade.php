@extends('layouts.welcome')
@section('content')
    <style>
        .input1{
            width: 350px;
            height: 25px;
        }

        .input2{
            width: 350px;
            height: 100px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4" style="padding-top: 50px;">
                <div class="row box">
                    <div class="col-md-6">
                        <img src="{{asset('lib/Images/Contact/img-01.png')}}" alt="Kitchen" style="height: 460px; width: 400px;margin-left: 0;">
                    </div>

                    <div class="col-md-6" style="padding-left:24px;">
                        <h1>Get In Touch</h1>
                        <hr>
                        <form>
                            @csrf

                            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                                <label for="name">NAME</label>
                                <br>
                                <input class="input1" type="text" name="name" placeholder="Name">
                                <span class="shadow-input1"></span>
                            </div>

                            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <label for="email">EMAIL</label>
                                <br>
                                <input class="input1" type="text" name="email" placeholder="Email" required>
                                <span class="shadow-input1"></span>
                            </div>

                            <div class="wrap-input1 validate-input" data-validate = "Contact is required">
                                <label for="sub">CONTACT</label>
                                <br>
                                <input class="input1" type="text" name="contact" placeholder="Contact" required>
                                <span class="shadow-input1"></span>
                            </div>

                            <div class="wrap-input1 validate-input" data-validate = "Message is required">
                                <label for="Msg">MESSAGE</label>
                                <br>
                                <textarea class="input2" name="message" placeholder="Message" style="resize: none"></textarea>
                                <span class="shadow-input1"></span>
                            </div>
                            <br>
                            <div class="container-contact1-form-btn">
                                <button class="contact1-form-btn"
                                        style="background-color: rgba(65,195,152,0.8); height: 30px;
                                           font-size: 16px;">
                            <span>
                                Send
                                <i class="icon-long-arrow-right" aria-hidden="true"></i>
                            </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
