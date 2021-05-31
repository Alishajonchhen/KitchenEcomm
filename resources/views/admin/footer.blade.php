<footer class="footer">
    <div class="ct-footer-post">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-md-12">
                    <div class="logo" style="width: 150px; height: 30px; margin-left: 50px;">
                        <img src="{{asset('lib/Images/baltra.png')}}" alt="Baltra" class="img-responsive">
                    </div>
                    <div class="inner-left">
                        <p>Purna Trading. Jawalakhel, Lalitpur</p>
                    </div>
                    <div class="middle" style="margin-left: 300px; padding-bottom: 100px;">
                        <ul>
                            <li><a>9843265432</a></li>
                            <li><a>01-5534328</a></li>
                            <li><a>01-5554324</a></li>
                        </ul>
                    </div>
                    <div class="inner-right">
                        <p>Copyright © 2021 BetterBuy.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('lib/dist/adminJs.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>

<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    //appearance of scroll in the table
    $(function() {
        $('#dataTable').DataTable({
            "sScrollY":"250px",
            "bScrollCollapse":true,
        });
        $('#productTable').DataTable({
            "sScrollY":"250px",
            "bScrollCollapse":true,
        });
    });
</script>
