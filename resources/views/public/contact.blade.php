@extends('public.layout.app')
@section('main')
    <div class="single" style="margin-top: 150px;">
        <div class="col-sm-12">
            <div class="mt-2" style="width: 100%">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none">
        <span class="alert-success-message"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
            <h4>Write for feedback / suggestions / complaints / anything</h4><br>
            <form method="POST" action="https://roktobangla.org/contact" accept-charset="UTF-8" id="regiForm" novalidate=""><input name="_token" type="hidden" value="CrxOQ70ErMARFEc4aXO0y5bjT5Y7lWWtWyKEf0Ig">
            <div class="form-group">
                <label class="control-label">Your Name<span>*</span></label>
                <input class="form-control" name="name" type="text" required
                       placeholder="Your Name"/>
            </div>
            <div class="form-group">
                <label class="control-label">Mobile Number (01XXXXXXXXX)<span>*</span></label>
                <input class="form-control is_number" name="mobile_no" required type="number" minlength="10"
                       maxlength="13" min="0"
                       placeholder="Your Mobile Number"/>
            </div>
            <div class="form-group">
                <label class="control-label">Write comments / suggestions / complaints here<span>*</span></label>
                <textarea class="form-control" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Send</button>
            </div>
            </form>
        </div>
    </div>
@endsection
