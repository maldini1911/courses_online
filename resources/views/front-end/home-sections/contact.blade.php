<div class="contact-us">
    <div class="title text-center">
        <h3 class="alert-primary" style="padding:15px">Contac-Us</h3>
    </div>
    <form action="{{url('add/message')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com" required="required">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="message" rows="3" placeholder="Message" required="required"></textarea>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="submit" class="btn btn-success">Send</button>
            </div>
        </form>
    </div>
</div>