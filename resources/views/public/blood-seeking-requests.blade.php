@extends('public.layout.app')
@section('main')
            <div class="single" style="margin-top: 150px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-4">
                            <h5>All blood requests</h5>
                            <div class="new-organisation">
                                <button class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#modal" onclick="loadModal('blood-seeking-post.html')">রক্তের জন্য রিকোয়েস্ট করুন</button>
                            </div>
                        </div>
                        <div class="col-12">
            <div class="mt-2" style="width: 100%">


            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none">
                <span class="alert-success-message"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div></div>

        <div class="col-sm-12 notice-bar-wrapper last_request">


            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-wrapper">
                                <div class="box">
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <div class="box-part text-center">
                                                    <h5 class="blood-group" style="padding: 4px;">
                                                        O-
                                                    </h5>
                                                    <div class="title">
                                                        <h5>ফোরকান</h5>
                                                                                                        <i class="fa fa-phone"></i><a href="#" title="নাম্বার দেখতে দয়া করে লগইন করুন">+88xxxxx577</a> <br>
                                                                                                        <small>স্থান: বরগুনা সদর</small> <br>
                                                        <small>পরিমাণ: 1 ব্যাগ</small><br>
                                                                                                        <small>তারিখ: ১০-ফেব্রুয়ারি-২০২১</small><br>

                                                        <span>স্ট্যাটাস:
                                                                                                                            <span class="badge badge-warning">অপেক্ষমান</span>
                                                                                                                </span>
                                                    </div>
                                                    <div class="text">
                                                        বিস্তারিত ঠিকানা: কুয়েত প্রবাসী হাসপাতাল,বরগুনা।
                                                    </div>
                                                    <small class="text-muted pull-right">অনুরোধ করা হয়েছে ৩ দিন ২২ ঘন্টা ১৫ মিনিট  আগে</small>
                                                    <a style="width:100%" href="login.html" class="btn btn-outline-danger mt-2" onclick="return confirmInterested(1018)">আমি রক্তদানে আগ্রহী</a>
                                                </div>
                                            </div>
                                        <div class="col-sm-4">
                                                <div class="box-part text-center">
                                                    <h5 class="blood-group" style="padding: 4px;">
                                                        O-
                                                    </h5>
                                                    <div class="title">
                                                        <h5>ফোরকান</h5>
                                                                                                        <i class="fa fa-phone"></i><a href="#" title="নাম্বার দেখতে দয়া করে লগইন করুন">+88xxxxx577</a> <br>
                                                                                                        <small>স্থান: বরগুনা সদর</small> <br>
                                                        <small>পরিমাণ: 1 ব্যাগ</small><br>
                                                                                                        <small>তারিখ: ১০-ফেব্রুয়ারি-২০২১</small><br>

                                                        <span>স্ট্যাটাস:
                                                                                                                            <span class="badge badge-warning">অপেক্ষমান</span>
                                                                                                                </span>
                                                    </div>
                                                    <div class="text">
                                                        বিস্তারিত ঠিকানা: কুয়েত প্রবাসী হাসপাতাল,বরগুনা।
                                                    </div>
                                                    <small class="text-muted pull-right">অনুরোধ করা হয়েছে ৩ দিন ২২ ঘন্টা ১৫ মিনিট  আগে</small>
                                                    <a style="width:100%" href="login.html" class="btn btn-outline-danger mt-2" onclick="return confirmInterested(1018)">আমি রক্তদানে আগ্রহী</a>
                                                </div>
                                            </div>
                                        <div class="col-sm-4">
                                                <div class="box-part text-center">
                                                    <h5 class="blood-group" style="padding: 4px;">
                                                        O-
                                                    </h5>
                                                    <div class="title">
                                                        <h5>ফোরকান</h5>
                                                                                                        <i class="fa fa-phone"></i><a href="#" title="নাম্বার দেখতে দয়া করে লগইন করুন">+88xxxxx577</a> <br>
                                                                                                        <small>স্থান: বরগুনা সদর</small> <br>
                                                        <small>পরিমাণ: 1 ব্যাগ</small><br>
                                                                                                        <small>তারিখ: ১০-ফেব্রুয়ারি-২০২১</small><br>

                                                        <span>স্ট্যাটাস:
                                                                                                                            <span class="badge badge-warning">অপেক্ষমান</span>
                                                                                                                </span>
                                                    </div>
                                                    <div class="text">
                                                        বিস্তারিত ঠিকানা: কুয়েত প্রবাসী হাসপাতাল,বরগুনা।
                                                    </div>
                                                    <small class="text-muted pull-right">অনুরোধ করা হয়েছে ৩ দিন ২২ ঘন্টা ১৫ মিনিট  আগে</small>
                                                    <a style="width:100%" href="login.html" class="btn btn-outline-danger mt-2" onclick="return confirmInterested(1018)">আমি রক্তদানে আগ্রহী</a>
                                                </div>
                                            </div>
                                            <div class="pagination-wrapper">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
