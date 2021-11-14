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

</div>        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
            <h4>মতামত/ পরামর্শ / অভিযোগ  / কোনো কিছু জানতে  লিখুন </h4><br>
            <form method="POST" action="https://roktobangla.org/contact" accept-charset="UTF-8" id="regiForm" novalidate=""><input name="_token" type="hidden" value="CrxOQ70ErMARFEc4aXO0y5bjT5Y7lWWtWyKEf0Ig">
            <input type="hidden" name="uuid" value="rokt_cont37713601d784f0285f">
            <div class="form-group">
                <label class="control-label">আপনার নাম<span>*</span></label>
                <input class="form-control" name="name" type="text" required
                       placeholder="আপনার নাম"/>
            </div>
            <div class="form-group">
                <label class="control-label">মোবাইল নম্বর (01XXXXXXXXX)<span>*</span></label>
                <input class="form-control is_number" name="mobile_no" required type="number" minlength="10"
                       maxlength="13" min="0"
                       placeholder="মোবাইল নম্বর লিখুন"/>
            </div>
            <div class="form-group">
                <label class="control-label">মতামত/ পরামর্শ / অভিযোগ এখানে লিখুন<span>*</span></label>
                <textarea class="form-control" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">সম্পন্ন করুন</button>
            </div>
            </form>
            <h6 class="text-center" style="margin-bottom: 15px;"><a href="https://facebook.com/emedical.com.bd"><img src="../res.cloudinary.com/emedical/image/upload/v1595473222/assets/messenger_hxwz2v.png" style="width: 20px;"></a> তাৎক্ষণিক সাহায্য পেতে <a href="https://facebook.com/emedical.com.bd">ফেসবুক  পেইজে ( fb.com/emedical.com.bd) </a>
                যোগাযোগ করুন <a href="https://facebook.com/emedical.com.bd"><img src="../res.cloudinary.com/emedical/image/upload/v1595473222/assets/messenger_hxwz2v.png" style="width: 20px;"></a> </h6>
        </div>
            </div>
@endsection
